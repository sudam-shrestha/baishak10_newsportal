<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:categories|max:255',
            'slug' => 'required|unique:categories|max:255',
            'meta_title' => 'nullable|unique:categories|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                "message" => $validator->errors()
            ]);
        }

        $category = new Category();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->save();
        return response()->json([
            'status' => true,
            "message" => "Category created successfully!"
        ]);
    }

    public function update(Request $request, $id)
    {
    
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status' => false,
                "message" => "Invalid Category ID"
            ]);
        }
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->save();
        return response()->json([
            'status' => true,
            "message" => "Category updated successfully!"
        ]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status' => false,
                "message" => "Invalid Category ID"
            ]);
        }
        $category->delete();
        return response()->json([
            'status' => true,
            "message" => "Category deleted successfully!"
        ]);
    }
}
