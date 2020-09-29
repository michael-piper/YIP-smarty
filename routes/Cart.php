<?php

namespace Routes;

use App\Config;
use App\Factory\Artifact;
use App\Logger;
use App\Routes;
use FastRoute\RouteCollector;
use GuzzleHttp\Psr7\Request;

class Cart extends Routes
{
    function register(RouteCollector &$routes)
    {
        $routes->get('/cart/product/{id:.+}', "\\Routes\\Cart::addProductToCart");
        $routes->get('/cart', "\\Routes\\Cart::viewProductCart");
    }
    static function addProductToCart(Request $request, string $productId)
    {
        $body = $request->getBody();
        $query = $_GET;
        $quantity = isset($query['quantity']) ? \intval($query['quantity']) : 1;
        $action = isset($query['action']) ? $query['action'] : "add";
        if (!\array_key_exists('cart', $_SESSION)) {
            $_SESSION['cart'] = [];
        }
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

        if ($product === false) {
            $request->smarty->assign("error", "Product not added to cart.");
        } else {
            if (\array_key_exists($product['productId'], $_SESSION['cart'])) {
                $quantity = $_SESSION['cart'][$product['productId']]['quantity'] + $quantity;
            }
            // $quantity is less than 0 or action is delete, remove item from cart.
            if ($quantity <= 0 || $action === "delete") {
                unset($_SESSION['cart'][$product['productId']]);
                $request->smarty->assign("success", "Product removed from cart.");
            } else {
                $frequentlyAdded = \array_key_exists("frequentlyAdded", $product) ? $product['frequentlyAdded']++ : 1;
                $productsStore->update([
                    'frequentlyAdded' => $frequentlyAdded
                ]);
                $_SESSION['cart'][$product['productId']] = compact('quantity', 'product');
                $request->smarty->assign("success", "Product added to cart.");
            }
        }
        $request->smarty->assign("cart", $_SESSION['cart']);
        return Artifact::html($request->smarty->display("cart.tpl"));
    }
    static function viewProductCart(Request $request)
    {
        if (!\array_key_exists('cart', $_SESSION)) {
            $_SESSION['cart'] = [];
        }
        $request->smarty->assign("cart", $_SESSION['cart']);
        return Artifact::html($request->smarty->display("cart.tpl"));
    }
}
