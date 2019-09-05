<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory ()
    {
        return view('admin.category.add-category');
    }

    public function newCategory (Request $request)
    {
        $this->validate($request, [
            'category_name'         => 'required',
            'publication_status'    => 'required'
        ]);

        $image      = $request->file('category_image');
        $imageName  = $image->getClientOriginalName();
        $directory  = './Category-Images/';
        $imageSave  = $image->move($directory,$imageName);
        $imageURL   = $directory.$imageName;

        $category =new Category();

        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->category_image       = $imageURL;
        $category->publication_status   = $request->publication_status;
        $category->save();

        return redirect()->back()->with('message', 'Category Created');
    }

    public function manageCategory ()
    {
        $categories = Category::all();
        return view('admin.category.manage-category', ['categories' => $categories]);
    }

    public function editCategory ($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit-category', ['category' => $category]);
    }

    public function updateCategory (Request $request)
    {
        $this->validate($request, [
            'category_name'         => 'required',
            'publication_status'    => 'required'
        ]);

        $category = Category::find ($request->category_id);
        $image    = $request->file('category_image');

        if ($image) {

            unlink($category->category_image);

            $imageName  = $image->getClientOriginalName();
            $directory  = './Category-Images/';
            $imageSave  = $image->move($directory,$imageName);
            $imageURL   = $directory.$imageName;
        } else {
            $imageURL   = $category->category_image;
        }

        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->category_image       = $imageURL;
        $category->publication_status   = $request->publication_status;
        $category->save();

        return redirect('/category/manage-category')->with('message', 'Category Updated');
    }

    public function deleteCategory ($id)
    {
        $category = Category::find($id);
        unlink($category->category_image);
        $category->delete();
        return redirect()->back();

    }
}
