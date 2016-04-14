<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class AdminCategoriesController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        
        return view('admin.categories.index')->with('categories', $categories);
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
