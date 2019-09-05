<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\ProductSubImage;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB;

class ProductController extends Controller
{
    public function addProduct ()
    {
        $categories = Category::all();
        $brands     = Brand::all();
        return view('admin.product.add-product', [
            'brands'        => $brands,
            'categories'    => $categories
        ]);
    }

    public function newProduct (Request $request)
    {
        $image          = $request->file('product_image');
        $imageName      = $image->getClientOriginalName();
        $directory      = './Brand-image/';
        $imageMove      = $image->move($directory, $imageName);
        $imageURL       = $directory.$imageName;

        $product = new Product();
        $product->category_id                   = $request->category_id;
        $product->brand_id                      = $request->brand_id;
        $product->product_name                  = $request->product_name;
        $product->product_code                  = $request->product_code;
        $product->product_discount_price        = $request->product_discount_price;
        $product->product_orginal_price         = $request->product_orginal_price;
        $product->product_short_description     = $request->product_short_description;
        $product->product_long_description      = $request->product_long_description;
        $product->product_image                 = $imageURL;
        $product->publication_status            = $request->publication_status;
        $product->save();

        $files = $request->file('file');
        foreach ($files as $file)
        {
            $fileImageName  = $file->getClientOriginalName();
            $fileDirectory  = './Product-sub-image/';
            $fileImageMove  = $file->move($fileDirectory, $fileImageName);
            $imagePath      = $fileDirectory.$fileImageName;

            $productSubImage = new ProductSubImage();
            $productSubImage->product_id = $product->id;
            $productSubImage->sub_image  = $imagePath;
            $productSubImage->save();
        }


        return redirect()->back()->with('message', 'Product Saved');
    }

//    public function getCategoryBrandName ($categoryId, $brandId)
//    {
//        $categoryName = Category::find($categoryId)->category_name;
//        $brandName = Brand::find($brandId)->brand_name;
//        $lastProductId   = Product::orderBy('id', 'DESC')->first()->id;
//        $result = [
//            'category_name' => $categoryName,
//            'brand_name'    => $brandName,
//            'lastProductId' => ($lastProductId+1),
//        ];
//        return json_encode($result);
//
//    }

    public function getCategoryBrandName ($categoryId, $brandId)
    {
        $categoryName = Category::find ($categoryId)->category_name;
        $brandName = Brand::find ($brandId)->brand_name;
        $lastProductId = Product::orderBy('id', 'DESC')->first()->id;
        $result = [
            'category_name'  => $categoryName,
            'brand_name'     => $brandName,
            'lastProductId' => ($lastProductId+1),
        ];

        return json_encode($result);
    }

    public function manageProduct ()
    {
        // ORM
        //$products = Product::orderBy('id', 'DESC')->skip(2)->take(2)->get();
        $products = Product::orderBy('id', 'DESC')->take(100)->select('id','category_id','brand_id','product_name','product_code','product_discount_price','product_orginal_price','publication_status')->get();

        //$products = Product::orderBy('id', 'DESC')->take(100)->get();

        //Query Builder

//        DB::table('products')
//            ->join('categories', 'products.category_id', '=', 'categories.id')
//            ->select('products.*', 'categories.category_name')
//            ->get();

//            $productss = DB::table('products')
//                ->join('Brands','products.brand_id', '=', 'brands_id')
//                ->select('products.*', 'brands.brand_name')
//                ->get();
//        $subImages = ProductSubImage::all();
//        return view('admin.product.manage-product', [
//            'products'  => $products,
//            'productSubImages'  => $subImages,
//        ]);
        return view('admin.product.manage-product', [
            'products' => $products,
        ]);
    }

    public function viewProduct ($id)
    {
        $product = Product::find($id);

        return view('admin.product.view-product', ['product' => $product]);
    }

    public function editProduct ($id)
    {
        $subImages      = ProductSubImage::where('product_id', $id)->get();
        $products       = Product::find($id);
        $categories     = Category::where ('publication_status', 1)->get();
        $brands = Brand::where ('publication_status', 1)->get();
        return view('admin.product.edit-product',[
            'categories'    => $categories,
            'products'      => $products,
            'brands'        => $brands,
            'subImages'     => $subImages,
        ]);
    }

    public function updateProduct (Request $request)
    {
        $product = Product::find($request->product_id);
        $image = $request->file('product_image');
        if ($image) {
            if (file_exists($product->product_image)) {
                unlink($product->product_image);
            };
            $imageName  = $image->getClientOriginalName();
            $directory  = './Brand-image/';
            $move   = $image->move($directory,$imageName);
            $URL    = $directory.$imageName;
        } else {
            $URL    = $product->product_image;
        }
        $product->category_id                   = $request->category_id;
        $product->brand_id                      = $request->brand_id;
        $product->product_name                  = $request->product_name;
        $product->product_code                  = $request->product_code;
        $product->product_discount_price        = $request->product_discount_price;
        $product->product_orginal_price         = $request->product_orginal_price;
        $product->product_short_description     = $request->product_short_description;
        $product->product_long_description      = $request->product_long_description;
        $product->product_image                 = $URL;
        $product->publication_status            = $request->publication_status;
        $product->save();

        $files      = $request->file('file');
        $productSubImages   = ProductSubImage::where('product_id', $request->product_id)->get();
        if ($files) {
            foreach ($productSubImages as $productSubImage) {
                if (file_exists($productSubImage->sub_image)) {
                    unlink($productSubImage->sub_image);
                }
                $productSubImage->delete();
            }
            foreach ($files as $file)
            {
                $fileImageName  = $file->getClientOriginalName();
                $fileDerectory  = './Product-sub-image/';
                $fileImageMove  = $file->move($fileDerectory,$fileImageName);
                $imagePath      = $fileDerectory.$fileImageName;

                $productSubImage    = new ProductSubImage();
                $productSubImage->product_id    = $product->id;
                $productSubImage->sub_image    = $imagePath;
                $productSubImage->save();
            }
        }

        return redirect('/product/manage-product');


//        old not working code
//        $product = Product::find($request->product_id);
//        $image   = $request->file('product_image');
//        if ($image){
//
//            $imageName  = $image->getClientOriginalName();
//            $directory  = './Brand-image/';
//            $move       = $image->move($directory,$imageName);
//            $URL        = $directory.$imageName;
//            //unlink($product->product_image);
//        }else{
//            $URL        = $product->product_image;
//        }
//
//
//        $product->category_id                   = $request->category_id;
//        $product->brand_id                      = $request->brand_id;
//        $product->product_name                  = $request->product_name;
//        $product->product_code                  = $request->product_code;
//        $product->product_discount_price        = $request->product_discount_price;
//        $product->product_orginal_price         = $request->product_orginal_price;
//        $product->product_short_description     = $request->product_short_description;
//        $product->product_long_description      = $request->product_long_description;
//        $product->product_image                 = $URL;
//        $product->publication_status            = $request->publication_status;
//        $product->save();
//
//        $files              = $request->file('file');
//        $productSubImages   = ProductSubImage::where('product_id', $request->product_id)->first();
//        if ($files) {
//            foreach ($files as $file)
//            {
//                //unlink($productSubImages->sub_image);
//                $fileImageName  = $file->getClientOriginalName();
//                $fileDirectory  = './Product-sub-image/';
//                $fileImageMove  = $file->move($fileDirectory, $fileImageName);
//                $imagePath      = $fileDirectory.$fileImageName;
//            }
//        } else {
//            $imagePath  = $productSubImages->sub_image;
//        }
//
//        $productSubImages->product_id = $product->id;
//        $productSubImages->sub_image  = $imagePath;
//        $productSubImages->save();
//
//        return redirect('/product/manage-product');
    }

    public function deleteProduct ($id)
    {
        $product = Product::find($id);
        unlink($product->product_image);
        $product->delete();
        return redirect()->back();
    }
}
