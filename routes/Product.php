<?php

namespace Routes;

use App\Config;
use App\Factory\Artifact;
use App\Logger;
use App\Routes;
use FastRoute\RouteCollector;
use GuzzleHttp\Psr7\Request;

class Product extends Routes
{
    function register(RouteCollector &$routes)
    {
        $routes->get('/products', "\\Routes\\Product::listProducts");
        $routes->get('/product/{id:[\w\d\-]+}', "\\Routes\\Product::viewProduct");
        $routes->post('/products', "\\Routes\\Product::addProduct");
    }
    static function listProducts(Request $request)
    {
        $productsStore = \SleekDB\SleekDB::store('products', Config::DATABASE_URL);
        $products = $productsStore->fetch();
        Logger::info("products", $products);
        $request->smarty->assign("products", $products);
        return $request->smarty->display("products.tpl");
    }
    static function addProduct(Request $request)
    {
        return Artifact::html($request->smarty->display("products.tpl"));
    }

    static function viewProduct(Request $request, $productId)
    {
        $productsStore = \SleekDB\SleekDB::store('products', Config::DATABASE_URL);
        $products = $productsStore
            ->keepConditions() // Won't reset the active query state.
            ->where('name', '=', $productId)
            ->orWhere('productId', '=', $productId)
            ->orWhere('sku', '=', $productId)
            ->limit(1);
        $product = $products->fetch();
        Logger::info("product", $product);
        $product = reset($product);
        if ($product !== false) {
            $view = \array_key_exists("viewed", $product) ? $product['viewed']++ : 1;
            $productsStore->update([
                'viewed' => $view
            ]);
            $suggested_products = $productsStore
                ->search('brand', $product['brand']);
            foreach (explode(" ", $product['name']) as $q) {
                $suggested_products = $suggested_products->search('name', $q);
            }
            foreach (explode(",", $product['searchKeywords']) as $q) {
                $suggested_products = $suggested_products->search('searchKeywords', $q);
            }
            foreach (explode(">", $product['category']) as $q) {
                $suggested_products = $suggested_products->search('category', $q);
            }
            $suggested_products = $suggested_products->fetch();
        } else {
            $suggested_products = $productsStore
                ->search('name', $productId)
                ->search('searchKeywords', $productId)
                ->search('category', $productId)
                ->search('brand', $productId)
                ->search('description', $productId)
                ->fetch();
        }

        $request->smarty->assign("product", $product);
        $request->smarty->assign("suggested_products", $suggested_products);
        return $request->smarty->display("product.tpl");
    }
}
