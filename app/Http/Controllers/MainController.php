<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    /** @var string */
    private const CATEGORIES_API_URL = 'http://testshop/api/v1/categories';

    /**
     * Show main page
     *
     * @return Application|Factory|View
     */
    public function show()
    {
        return view('index', [
            'title' => 'Test shop 2022'
        ]);
    }

    /**
     * Show categories list
     *
     * @return Application|Factory|View
     * @throws GuzzleException
     */
    public function categories()
    {
        $categories = ConnectController::apiConnectAction('GET', self::CATEGORIES_API_URL);

        return view('product/categories', [
            'categories' => $categories
        ]);
    }
}
