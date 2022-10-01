<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    /**
     * Show all products via api request
     *
     * @return object
     */
    public function getAllProducts() : object
    {
        return Product::all();
    }

    /**
     * Show all categories via api request
     *
     * @return object
     */
    public function getAllCategories() : object
    {
        return Category::all();
    }

    /**
     * Show products of the selected category via api request
     *
     * @param $code
     * @return array|object
     */
    public function getCategoryProducts(string $code) : array
    {
        $category = Category::where('code', $code)->first();

        if(empty($category)) {
            return response(['Message' => 'Invalid request ( There is no category for this code )'], 400);
        }

        $products = Product::where('category_id', $category->id)->get();

        if(empty($products)) {
            return response(['Message' => 'No products found in this category'], 404);
        }

        return [
            'category' => $category,
            'products' => $products
        ];
    }

    /**
     * Show one product via api request
     *
     * @param $code
     * @return object
     */
    public function getProduct(string $code) : object
    {
        $product = Product::where('code', $code)->first();

        if(empty($product)) {
            return response(['Message' => 'Invalid request ( There is no product for this code )'], 400);
        }

        return $product;
    }

    /**
     * Show products with additional parameters via api request.
     *
     * @param string $filter
     * @param string|null $sort
     * @param int|null $paginate
     * @return mixed
     */
    public function getSortProducts(string $filter, string $sort = null, int $paginate = null)
    {
        if(empty($filter)) {
            return response(['Message' => 'Invalid request ( Filter not passed )'], 400);
        }

        if ($sort == null) {
            $sort = 'asc';
        }

        return Product::orderBy($filter, $sort)->paginate($paginate);
    }
}
