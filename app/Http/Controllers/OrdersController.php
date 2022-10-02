<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    /** @var string */
    const ORDERS_API_URL = 'http://testshop/api/v1/orders';
    /** @var string */
    const ORDER_CREATE_API_URL = 'http://testshop/api/v1/order/create';

    /**
     * Show orders list
     *
     * @return Application|Factory|View
     * @throws GuzzleException
     */
    public function showOrders()
    {
        $orders = ConnectController::apiConnectAction('GET', self::ORDERS_API_URL);

        return view('order/list', [
            'orders' => $orders
        ]);
    }

    /**
     * Creation of an order based on parameters from the view
     *
     * @param OrderRequest $request
     * @return RedirectResponse
     */
    public function createOrder(OrderRequest $request) : RedirectResponse
    {
        $validate = $request->validate([
            'product_name' => '|string|max:255|min:3',
            'first_name' => '|string|max:64',
            'last_name' => '|string|max:64',
            'qty' => '|integer|min:1'
        ]);

        $params = [
            'product_name' => $request->product_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'qty' => $request->qty,
            'code' => $request->product_code
        ];

        $response = Http::post(self::ORDER_CREATE_API_URL, $params);

        return redirect()->route('orders.show')->with('success', 'Замовлення успішно створено');
    }
}
