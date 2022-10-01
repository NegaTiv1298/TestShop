<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

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
     * @return array
     */
    public function getCategoryProducts(string $code) : array
    {
        $category = Category::where('code', $code)->first();
        $products = Product::where('category_id', $category->id)->get();

        return [
            'category' => $category,
            'products' => $products
        ];
    }

    /**
     * Show one product via api request
     *
     * @param $code
     * @return mixed
     */
    public function getProduct(string $code) : object
    {
        $product = Product::where('code', $code)->first();

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
        if ($sort == null) {
            $sort = 'asc';
        }

        return Product::orderBy($filter, $sort)->paginate($paginate);
    }
}
