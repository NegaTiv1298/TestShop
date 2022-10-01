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
}
