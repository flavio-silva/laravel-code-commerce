<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product as ProductModel;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\Product as ProductRequest;

class ProductController extends Controller
{
    private $model;

    public function __construct(ProductModel $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $categories = $this->model->all();
        return view('product.index', compact('categories'));
    }

    public function create()
    {
        return view('product.create');
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

    public function edit($id)
    {
        $product = $this->model->find($id);
        return view('product.edit', compact('product'));
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
