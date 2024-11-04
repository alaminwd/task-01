<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Image;


class CategoryController extends Controller
{

    function category(){
        $categories = Category::all();
        return view('category.category',[
            'categories'=>$categories,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'category' => 'required|string|max:255|unique:categories,category',
            'image' => 'required|image|max:2048',
        ]);
    
    
        try {
            $rendom = rand(1000, 9999);
            $image = $request->file('image');
            $file_name = $rendom . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('upload/category_images/' . $file_name));
    
            Category::create([
                'category' => $request->category,
                'image' => $file_name,
            ]);
    
            return back()->with('success','Category added successfully!');
        } 
        catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
    
    function delete_category($id){
            $present_img = Category::find($id);
            if ($present_img && $present_img->image != null) {
                $image_path = public_path('upload/category_images/' . $present_img->image);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        
            if ($present_img) {
                $present_img->delete();
            } 
             return redirect()->route('category');
    }

    function category_edit($id){
        $select_category = Category::where('id', $id)->first();
        return view('category.category_edit',[
            'select_category'=>$select_category,
        ]);
    }

    public function category_update(Request $request) {

        $category = Category::find($request->input('id'));
    
    

        if ($category->image != '') {
            $image_path = public_path('upload/category_images/' . $category->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
    
        if ($request->hasFile('image')) {
            $rendom = rand(1000, 9999);
            $image = $request->file('image');
            $file_name = $rendom . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('upload/category_images/' . $file_name));
        
        }
    
        // Update category fields
        $category->update([
            'category' => $request->category,
            'image' => $file_name,
        ]);
    
        return redirect()->route('category')->with('update_success', 'Category Updated Successfully!');
    }
    
}

