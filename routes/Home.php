<?php

namespace Routes;

use App\Config;
use App\Factory\Artifact;
use App\Factory\Func;
use App\Logger;
use App\Routes;
use FastRoute\RouteCollector;
use GuzzleHttp\Psr7\Request;

class Home extends Routes
{
    function register(RouteCollector &$routes)
    {
        $routes->get('/', "\\Routes\\Home::home");
        $routes->get('/home', "\\Routes\\Home::home");
        $routes->get('/load', "\\Routes\\Home::loadProducts");
    }
    static function loadProducts(Request $request)
    {
        $productsStore = \SleekDB\SleekDB::store('products', Config::DATABASE_URL);
        $productsStore->delete();
        $data = @\json_decode(\file_get_contents(__DIR__ . "/../products.json"));
        if ($data) {
            foreach ($data as $product) {
                $p = [];
                foreach ($product as $key => $value) {
                    $p[Func::camelCase($key)] = $value;
                }
                $p['viewed'] = 1;
                $p['frequentlyAdded'] = 1;
                $productsStore->insert($p);
            }
        }
        return Artifact::html("Products");
    }
    static function home(Request $request)
    {
        $productsStore = \SleekDB\SleekDB::store('products', Config::DATABASE_URL);
        $logsStore = \SleekDB\SleekDB::store('logs', Config::DATABASE_URL);
        $logs = $logsStore
            ->keepConditions() // Won't reset the active query state.
            ->where('name', '=', "a")
            ->where('value', '>', 0)->limit(1);
        $a = 1;
        $r = $logs->fetch();
        $r = reset($r);
        Logger::info("Increment result: ", $r);
        if ($r === false) {
            $logsStore->insert([
                'name' => 'a',
                'value' => $a
            ]);
        } else {
            $a = $r['value'];
            $a++;
        }
        $suggested_products = $productsStore;
        if (\array_key_exists('cart', $_SESSION)) {
            foreach ($_SESSION['cart']  as $p) {
                foreach (explode(",", $p['product']['searchKeywords']) as $q) {
                    $suggested_products = $suggested_products->search('searchKeywords', $q);
                }
                foreach (explode(">", $p['product']['category']) as $q) {
                    $suggested_products = $suggested_products->search('category', $q);
                }
            }
        }
        $suggested_products =  $suggested_products->orderBy('desc', 'frequentlyAdded')
            ->orderBy('desc', 'viewed')
            ->fetch();
        Logger::info("Increment: ", $a);
        $logsStore->update(['value' => $a]);
        $request->smarty->assign("a", $a);
        $request->smarty->assign("products", $suggested_products);
        return Artifact::html($request->smarty->display("home.tpl"));
    }
}
