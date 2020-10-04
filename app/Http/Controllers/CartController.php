<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Cart;
use Mail;
use App\checkout;
use App\Mail\SendEmail;
use Session;
use App\shipping;
use App\orders;
use App\product_deteils;

class CartController extends Controller
{
    public function addcart(Request $request){
               $model = new product();

               $product = product::find($request->product_id);
               Cart::add(array(
                'id' => $product->id, // inique row ID
                'name' =>$product->product_name,
                'price' => $product->price,
                'quantity' => $request->product_quantity,
                'attributes' => array(
                    'image'=>$product->image,
                )

            ));
            $massage  = array(
                "massage"=>"product add cart  successfully",
                "alert-type"=>"info"
            );
            return redirect()->route('shop.view')->with($massage);
    }
    public function removecart($removeid){
        Cart::remove($removeid);
        $massage  = array(
            "massage"=>"product remove  successfully",
            "alert-type"=>"info"
        );
        return redirect()->back()->with($massage);
    }
    public function updatequantity(Request $request){
                $update = product::find($request->product_hidden_id);
                $update_product = $update->id;
                Cart::update( $update_product, array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->product_quantity
                    ),
                  ));
                  $massage  = array(
                    "massage"=>"quantity update  successfully",
                    "alert-type"=>"info"
                );
                return redirect()->back()->with($massage);

    }
    public function checkoutform (){
            return view ('layouts.allpage.checkout_form');
    }
    public  function store(Request $request){
                   $validate = $request->validate([
                      'first_name'=>"required|max:15",
                      'last_name'=>"required|max:15",
                      'email'=>"email|required",
                      'phone'=>'required|max:11|min:11',
                      'password'=>'required|min:8|',
                      'address'=>'required'
                   ]);
                   $model = new checkout();
                   $model->first_name = $request->first_name;
                   $model->last_name = $request->last_name;
                   $model->email = $request->email;
                   $model->phone = $request->phone;
                   $model->password = $request->password;
                   $model->address = $request->address;
                   $model->save();
                   //this code only send email
                 Session::put(['registion_id' => $model->id]);
                   $data = [
                       'first_name'=>$request->first_name,
                       'last_name'=>$request->last_name,
                       'email'=>$request->email,
                       'phone'=>$request->phone,
                       'password'=>$request->password,
                       'address'=>$request->address
                   ];
                   Mail::to($data['email'])->send(new SendEmail($data));
                   //end send mail code
                   $massage  = array(
                    "massage"=>"your register successfully please check your email",
                    "alert-type"=>"info"
                );
                return redirect()->route('shipping.form')->with($massage);
           }
           public function shippingform(){

             $id =  checkout::find(Session::get('registion_id'));

                   return view ('layouts.allpage.shipping',compact('id'));
           }
            public function shippingstore(Request $request){
                      $model = new shipping;
                      $model->full_name=$request->full_name;
                      $model->email = $request->email;
                      $model->phone = $request->phone;
                      $model->address=$request->address;
                      $model->save();
                      Session::put([
                          'shipping_id' =>$model->id
                          ]);
                      $massage  = array(
                        "massage"=>"successfully sipping confirm....",
                        "alert-type"=>"info"
                    );
                    return redirect()->route('payment.form')->with($massage);
            }
            public function paymentform(){
                     return view ('layouts.allpage.payment_form');
            }
            // ***************************
                //this code is only orders and product deteils
                //insert main content such as all
            // ***************************

            public function paymentstore(Request $request){

                     if($request->payment_type == "Cash"){

                            $order = new orders();
                         $order->checkout_id = Session::get('registion_id');
                         $order->shepping_id=Session::get('shipping_id');
                         $order->total_price = Session::get('total_price');
                         $order->payment_type=$request->payment_type;
                         $order->save();
                        //  this is model product deteils.....
                         $product_deteils = new product_deteils();
                          $product_deteils->order_id = $order->id;
                         //return $product_deteils->product_id = Cart::getContent();
                         foreach(Cart::getContent() as $product_content){
                            $product_deteils->product_id = $product_content->id;
                           $product_deteils->product_name = $product_content->name;
                            $product_deteils->product_price= $product_content->price;
                            $product_deteils->product_image = $product_content->attributes->image;
                            $product_deteils->product_quantity = $product_content->quantity;
                            $product_deteils->save();
                         }
                         //clean the cart
                         Cart::clear();
                         $massage  = array(
                            "massage"=>"your order successfully....",
                            "alert-type"=>"info"
                        );
                        return redirect()->route('index')->with($massage);

                     }elseif($request->payment_type == "Paypal"){

                     }elseif($request->payment_type == "Bkash"){

                     }
            }

}
