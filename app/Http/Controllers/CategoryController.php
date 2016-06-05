<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category as CategoryModel;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\Category as CategoryRequest;

class CategoryController extends Controller
{
    private $model;

    public function __construct(CategoryModel $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $categories = $this->model->paginate(10);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->model->fill($input);
        $category->save();

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = $this->model->find($id);
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->model->find($id)->update($request->all());
        return redirect()->route('category.index');
    }
}
