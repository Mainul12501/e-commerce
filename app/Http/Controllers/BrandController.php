<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand ()
    {
        return view('admin.brand.add-brand');
    }

    public function newBrand (Request $request)
    {
        $this->validate($request, [
            'brand_name'            => 'required',
            'publication_status'    => 'required'
        ]);

        $image      = $request->file('brand_image');
        $imageName  = $image->getClientOriginalName();
        $directory  = './Brand-image/';
        $imageSave  = $image->move($directory, $imageName);
        $imageURL   = $directory.$imageName;

        $brand = new Brand();
        $brand->brand_name          = $request->brand_name;
        $brand->brand_description   = $request->brand_description;
        $brand->brand_image         = $imageURL;
        $brand->publication_status  = $request->publication_status;
        $brand->save();
        return redirect()->back()->with('message', 'Brand Added');
    }

    public function manageBrand ()
    {
        $brands = Brand::all();
        return view('admin.brand.manage-brand', ['brands' => $brands]);
    }

    public function editBrand ($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit-brand', ['brand' => $brand]);
    }

    public function updateBrand (Request $request)
    {

        $this->validate($request, [
            'brand_name'            => 'required',
            'publication_status'    => 'required'
        ]);
        $brand = Brand::find($request->brand_id);
        $image = $request->file('brand_image');
        if ($image) {

            unlink($brand->brand_image);

            $imageName  = $image->getClientOriginalName();
            $directory  = './Brand-image/';
            $imageSave  = $image->move($directory, $imageName);
            $imageURL   = $directory.$imageName;
        } else {
            $imageURL   = $brand->brand_image;
        }

        $brand->brand_name          = $request->brand_name;
        $brand->brand_description   = $request->brand_description;
        $brand->brand_image         = $imageURL;
        $brand->publication_status  = $request->publication_status;
        $brand->save();
        return redirect('/brand/manage-brand');
    }

    public function deleteBrand ($id)
    {
        $brand = Brand::find ($id);
        unlink($brand->brand_image);
        $brand->delete();
        return redirect()->back();
    }
}
