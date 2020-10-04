<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\product;
use Image;

class ProductController extends Controller
{
    public function product_form()
    {
        $category = DB::table('categories')->where('publication_status', 1)->get();
        return view('layouts.admin.product.product_form', compact('category'));
    }
    public function saveproduct(request $request)
    {
        $val = $request->validate([
                'product_name'=>'required|max:20',
                'product_category_id'=>'required',
                'short_description'=>'required|max:30',
                'long_description'=>"required|min:100",
                'price'=>'required|integer',
                'publication_status'=>"required",
                'image'=>"required"


            ]);
        $insert = DB::table('products')->insertGetId([
              "product_name"=>$request->product_name,
              "product_category_id"=>$request->product_category_id,
              "short_description"=>$request->short_description,
              "long_description"=>$request->long_description,
              "price"=>$request->price,
              "publication_status"=>$request->publication_status
        ]);
        if ($image=$request->file('image')) {
            $text =hexdec(uniqid());
            $extention = strtolower($image->getClientOriginalExtension());
            $image_fullname=$text.".".$extention;
            $image_path="images/product_images/";
            $image_url =$image_path.$image_fullname;
            $image->move($image_path, $image_fullname);
            DB::table('products')->where('id', $insert)->update([
                   "image"=>$image_url

             ]);
        }
        if ($insert) {
            $massage=array(
                 "massage"=>"your product uploaded succesfully",
                 "alert-type"=>"info"
             );
            return redirect()->back()->with($massage);
        }
    }

    public function productmanage()
    {
        $getproduct = product::join('categories', 'categories.id', '=', 'products.product_category_id')->select(['products.*','categories.category_name'])->paginate(5);
        $trashed = product::onlyTrashed()->paginate(5);
        return view('layouts.admin.product.product_manage', compact('getproduct', 'trashed'));
    }
    public function productunpublish($id)
    {
        $model = new product();
        $unpublish = product::find($id);
        $unpublish->publication_status=0;
        $unpublish->save();
        $massage  = array(
             "massage"=>"product unpublish successfully",
             "alert-type"=>"success"
         );
        return redirect()->back()->with($massage);
    }
    public function productpublish($id)
    {
        $publish = product::find($id);
        $publish->publication_status=1;
        $publish->save();
        $massage  = array(
           "massage"=>"product publish successfully",
           "alert-type"=>"success"
       );
        return redirect()->back()->with($massage);
    }
    public function delete($id)
    {
        product::find($id)->delete();
        $massage  = array(
           "massage"=>"product delete successfully",
           "alert-type"=>"info"
       );
        return redirect()->back()->with($massage);
    }
    public function edit($id)
    {
        $cats = DB::table('categories')->get();
        $product = DB::table('products')->where('id', $id)->get();
        return view('layouts.admin.product.edit_form', compact('cats', 'product'));
    }

    public function update(request $request, $id){
        $validation = $request->validate([
            'product_name'=>'required|max:20',
            'product_category_id'=>'required',
            'short_description'=>'required|max:30',
            'long_description'=>"required|min:100",
            'price'=>'required|integer',
            'publication_status'=>"required",
            'image'=>"required|image|mimes:jpg,png,jpeg,gif,svg"
        ]);
         $data = array();
         $data['product_name']=$request->product_name;
         $data['product_category_id']=$request->product_category_id;
         $data['short_description']=$request->short_description;
         $data['long_description']=$request->long_description;
         $data['price']=$request->price;
         $data['publicaction_status']=$request->publication_status;
         $image = $request->file('photo');
         if($image){
             $text = hexdec(uniqid());
             $extenstion = strtolower($image->getClientOriginalExtension());
             $imagefull_name = $text.".".$extenstion;
             $image_path ="images/product_images/";
             $image_url = $image_path.$imagefull_name;
             $image->move($image_path,$imagefull_name);
             unlink($request->old_image);
             $data['image']=$image_url;
            DB::table('products')->where('id',$id)->update($data);
             $massage=array(
                 "massage"=>"your post edit successfully",
                 "alert-type"=>"success"
             );
             return redirect()->back()->with($massage);
         }else{
             $data['image']=$request->old_image;
             DB::table('products')->where('id',$id)->update($data);
             $massage=array(
                "massage"=>"your post edit successfully",
                "alert-type"=>"success"
            );
            return redirect()->back()->with($massage);
         }
      }

   public function restoredelete($id){
          $model = new product();
          $restore = product::where('id',$id)->restore();
          $massage  = array(
            "massage"=>"product restore  successfully",
            "alert-type"=>"info"
        );
        return redirect()->back()->with($massage);

   }
   public function forcedelete($id){
            $model = new product();
            product::where('id',$id)->forceDelete();
            $massage  = array(
                "massage"=>"parmammently product delete  successfully",
                "alert-type"=>"info"
            );
            return redirect()->back()->with($massage);
   }



}
