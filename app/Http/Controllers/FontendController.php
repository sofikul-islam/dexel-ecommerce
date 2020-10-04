<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use DB;
class FontendController extends Controller
{
    public function index(){
           $model = new product;
           $products = product::where('publication_status',1)->orderBy('id','desc')->take(8)->get();
           $category = category::where('publication_status',1)->get();
           $allproducts = product::where('publication_status',1)->get();
            return view('welcome',compact('products','category','allproducts'));
    }
   public function productdeteils($id){
            $product_deteils = DB::table('products')->where('id',$id)->get();
            //releted product code
           $products = product::find($id);
           $releted_product = product::where('product_category_id',$products->product_category_id)->where('id',"!=",$id)->get();
            return view ('layouts.allpage.product_deteils',compact('product_deteils','releted_product'));
   }
   public function shopview(){
           //shop page view
           $shop_category = DB::table('categories')->where('publication_status',1)->get();
           $shop_product = DB::table('products')->where('publication_status',1)->paginate(12);
           $shop_product1 = DB::table('products')->where('publication_status',1)->paginate(9);
           return view('layouts.allpage.shop_page',compact('shop_category','shop_product','shop_product1'));
   }
   public function shopcategoryview($categoryid){
             $category_show = product::find($categoryid);
             $category_main = product::where('product_category_id',$categoryid)->where('publication_status',1)->paginate(5);
             return view('layouts.allpage.shop_category_view',compact('category_main'));
   }
}
