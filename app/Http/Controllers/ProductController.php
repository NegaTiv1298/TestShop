<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /** @var string */
    private const PRODUCTS_API_URL = 'http://testshop/api/v1/products';
    /** @var string */
    private const PRODUCT_API_URL = 'http://testshop/api/v1/product';

    /**
     * Show products list
     *
     * @return Application|Factory|View
     * @throws GuzzleException
     */
    public function show()
    {
        $products = ConnectController::apiConnectAction('GET', self::PRODUCTS_API_URL);

        return view('product/list', [
            'products' => $products
        ]);
    }

    /**
     * Show product card
     *
     * @param $code
     * @return Application|Factory|View
     * @throws GuzzleException
     */
    public function card($code)
    {
        $product = ConnectController::apiConnectAction('GET', self::PRODUCT_API_URL."/$code");

        return view('product/card', [
            'product' => $product
        ]);
    }

    /**
     * Show page with the order creation form
     *
     * @param $code
     * @return Application|Factory|View
     * @throws GuzzleException
     */
    public function buy($code)
    {
        $product = ConnectController::apiConnectAction('GET', self::PRODUCT_API_URL."/$code");

        return view('order/create', [
           'product' => $product
        ]);
    }
}
