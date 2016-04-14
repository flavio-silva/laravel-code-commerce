<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Product;

class AdminProductsController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();
        return view('admin.products.index', ['products' => $products]);
    }

    public function show()
    {

    }

    public function store()
    {

    }

    public function destroy()
    {

    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function edit()
    {
        
    }
}