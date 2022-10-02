<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /** @var string */
    private const PRODUCTS_API_URL = 'http://testshop/api/v1/products';
    /** @var string */
    private const PRODUCT_API_URL = 'http://testshop/api/v1/product';
    /** @var string */
    private const PRODUCT_EDIT_API_URL = 'http://testshop/api/v1/product/edit';

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

    /**
     * Get a view to edit the product
     *
     * @param $code
     * @return Application|Factory|View
     * @throws GuzzleException
     */
    public function getEditView($code)
    {
        $product = ConnectController::apiConnectAction('GET', self::PRODUCT_API_URL."/$code");

        return view('product/edit', [
            'product' => $product
        ]);
    }

    public function edit(ProductRequest $request)
    {
        $validate = $request->validate([
            'product_name' => 'string|max:255|min:3',
            'price' => 'integer|min:1',
            'qty' => 'integer|min:1'
        ]);

        $params = [
            'product_name' => $request->product_name,
            'price' => $request->price,
            'qty' => $request->qty,
            'code' => $request->product_code
        ];

        $response = Http::post(self::PRODUCT_EDIT_API_URL, $params);

        if ($response->status() != 200) {
            return redirect()->route('product.card', ['code' => $request->product_code])->with('error', 'Проблеми із редагуванням товару. Будь ласка, спробуйте ще раз');
        }

        return redirect()->route('product.card', ['code' => $request->product_code])->with('success', 'Товар успішно відредагований');

    }
}
