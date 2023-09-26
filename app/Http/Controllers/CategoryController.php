<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CategoryController extends Controller
{   
    // get list
    public function index()
    {
        return Category::all();
    }

    // show a category
    public function show(Request $request, $id)
    {   
        $category = Category::find($id);
        if(empty($category))
        {
            return [];
        }
        return $category;
    }

    // store a category
    public function store(Request $request)
    {   
        $data = Arr::only($request->all(), 'name');
        return Category::create($data);
    }

    // update a category
    public function update(Request $request, $id)
    {
        $data = Arr::only($request->all(), 'name');
        Category::query()->where('id', '=', $id)->update($data);
        return [
            'id' => $id
        ];
    }

    // update a category
    public function destroy($id)
    {
        Category::destroy($id);
        return [
            'id' => $id
        ];
    }
    
}
