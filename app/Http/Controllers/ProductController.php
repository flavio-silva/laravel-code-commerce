<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product as ProductModel;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\Product as ProductRequest;
use CodeCommerce\Category;

class ProductController extends Controller
{
    private $model;

    public function __construct(ProductModel $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $products = $this->model->paginate(10);
        return view('product.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->model->fill($input);
        $product->save();

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();
        return redirect()->route('product.index');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->model->find($id);

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $data['featured'] = isset($data['featured']) ? 1 : 0;
        $data['recommend'] = isset($data['recommend']) ? 1 : 0;
        $this->model->find($id)->update($data);
        return redirect()->route('product.index');
    }
}
