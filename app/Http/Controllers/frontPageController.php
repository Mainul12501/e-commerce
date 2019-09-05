<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\ProductSubImage;
use Illuminate\Http\Request;

class frontPageController extends Controller
{
    public function index ()
    {
        $products   = Product::where ('publication_status', '1')->get();
        $categories = Category::where ('publication_status', '1')->get();
        $brands     = Brand::where ('publication_status', '1')->get();
        return view('front.home.home', [
            'products'      => $products,
            'categories'    => $categories,
            'brands'        => $brands
        ]);
    }

    public function productPage ($id)
    {
        $categories     = Category::where ('publication_status', '1')->get();
        $products       = Product::where('category_id', $id)->orderBy('id', 'DESC')->get();
        $categoryName   = Category::find($id)->category_name;
        return view('front.product.product-page', [
            'categories'    => $categories,
            'products'      => $products,
            'categoryName'  => $categoryName
        ]);
    }

    public function productDetails ($id)
    {
        $product                = Product::find($id);
        $categoryProducts       = Product::where('category_id',$product->category_id)->orderBy('id','DESC')->get();
        $subImages              = ProductSubImage::where('product_id', $id)->get();
        $categories             = Category::where ('publication_status', '1')->get();
        $brands                 = Brand::where ('publication_status', '1')->get();
        return view('front.product.product-details', [
            'categories'        => $categories,
            'product'           => $product,
            'brands'            => $brands,
            'subImages'         => $subImages,
            'categoryProducts'  => $categoryProducts
        ]);
    }



}
