<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'categoryName' => 'required',
            'descriptionCategory' => 'required'
        ]);

        $data = $request->categoryName;
        $cekData = Category::where('categoryName', $data)->value('id');

        if($cekData){
            return back()->with('error', "Category '$data' already exists");
        } else {
            Category::create([
                'categoryName' => $request->categoryName,
                'descriptionCategory' => $request->descriptionCategory
            ]);
        }

        return to_route('produk.index')->with('success', "Category '$data' added successfully");
    }

    public function form(){
        return view('input_view.inputCategory', [
            'title' => 'Add Category'
        ]);
    }
}
