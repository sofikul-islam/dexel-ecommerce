<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\category;

class CategoryController extends Controller
{
    public function category_form(){
           return view('layouts.admin.category.category_form');
    }
    public function category_add(request $request){
         $validation = $request->validate([
              'category_name'=>'required|max:20|unique:categories,category_name',
              'category_description'=>'required|max:30',
              'publication_status'=>'required'
         ]);
         $category = new category();
         $category->category_name = $request->category_name;
         $category->category_description = $request->category_description;
         $category->publication_status = $request->publication_status;
         $category->save();
         $massage = array(
             "massage"=>"Your Category Insert Successfully",
             "alert-type"=>"info"
         );
         return redirect()->back()->with($massage);
    }
    public function managecategory(){
          $getCategory = category::paginate(5);
          return view ('layouts.admin.category.manage_category',compact('getCategory'));
    }
    public function unpublished($id){
          $unpublish = category::find($id);
          $unpublish->publication_status = 0;
          $unpublish->save();
          $massage = array(
              "massage"=>"your category unpublish successfully",
              "alert-type"=>"info"
          );
          return redirect()->back()->with($massage);
    }
    public function published($id){
         $publish = category::find($id);
         $publish->publication_status = 1;
         $publish->save();
         $massage=array(
              "massage"=>"your category publish successfully",
              "alert-type"=>"success"
         );
         return redirect()->back()->with($massage);
    }
    public function destroy($id){
         DB::table('categories')->where('id',$id)->delete();
        $massage=array(
            "massage"=>"your category Delete successfully",
            "alert-type"=>"success"
        );
        return redirect()->back()->with($massage);
    }
    public function edit_category($id){
          //using query builder
           $getdata = DB::table('categories')->where('id',$id)->get();
           return view('layouts.admin.category.edit_category',compact('getdata'));
    }
    public function update(request $request,$id){
        $validation = $request->validate([
            'category_name'=>'required',
            'category_description'=>'required',
            'publication_status'=>'required'
        ]);
          $update = category::find($id);
          $update->category_name = $request->category_name;
          $update->category_description = $request->category_description;
          $update->publication_status = $request->publication_status;
          $update->save();
        $massage=array(
            "massage"=>"your category Updated successfully",
            "alert-type"=>"info"
        );
        return redirect()->route('manage_category')->with($massage);
    }
}
