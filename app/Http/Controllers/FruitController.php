<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FruitController extends Controller
{   
    // get list
    public function index()
    {
        return Fruit::all();
    }

    // show a fruit
    public function show(Request $request, $id)
    {   
        $fruit = Fruit::find($id);
        if(empty($fruit))
        {
            return [];
        }
        return $fruit;
    }

    // store a fruit
    public function store(Request $request, $category)
    {   
        $data = Arr::only($request->all(), ['category_id', 'name', 'image', 'description', 'price']);
        $data['category_id'] = $category;
        return Fruit::create($data);
    }

    // update a fruit
    public function update(Request $request, $category, $fruit)
    {
        $data = Arr::only($request->all(), ['name', 'image', 'description', 'price']);
        Fruit::query()->where('id', '=', $fruit)->update($data);
        return [
            'id' => $fruit
        ];
    }

    // update a fruit
    public function destroy(Request $request, $category, $fruit)
    {
        Fruit::destroy($fruit);
        return [
            'id' => $fruit
        ];
    }
    
}
