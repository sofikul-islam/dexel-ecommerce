<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\checkout;
use App\shipping;
use App\orders;
use App\product_deteils;
use PDF;
class OrderController extends Controller
{
   public function ordertable(){
          $order_checkout = DB::table('orders')
                           ->join('checkouts','orders.checkout_id','checkouts.id')
                           ->select('orders.*','checkouts.first_name','last_name')
                           ->get();
           return view ('layouts.allpage.order_table',compact('order_checkout'));
   }

            public function orderdeteilsview($id){
                  $orders = new orders();
                  $checkout = new checkout();
                  $shipping = new shipping;
                 $order_info = DB::table('orders')->where('id',$id)->get();
                 $order =orders::find($id);
                 $check =checkout::where('id',$order->checkout_id)->get();
                 $shipp = shipping::where('id',$order->shepping_id)->get();
                 $product_deteils =product_deteils::where('order_id',$order->id)->get();
                   return view ('layouts.allpage.order_deteils_view',compact('order_info','check','shipp','product_deteils'));
             }
             public function orderinvoiceview($invoiceid){
                           $orders = new orders();
                           $checkout = new checkout;
                           $shipping = new shipping;
                           $order_info = DB::table('orders')->where('id',$invoiceid)->get();
                           $order = orders::find($invoiceid);
                           $check =checkout::where('id',$order->checkout_id)->get();
                           $shipp = shipping::where('id',$order->shepping_id)->get();
                           $product_deteils = product_deteils::where('order_id',$order->id)->get();
                           return view ('layouts.allpage.order_invoice_view',compact('check','shipp','product_deteils'));
             }
             public function invoicedownload($invoice){
                $orders = new orders();
                $checkout = new checkout;
                $shipping = new shipping;
                $order_info = DB::table('orders')->where('id',$invoice)->get();
                $order = orders::find($invoice);
                $check =checkout::where('id',$order->checkout_id)->get();
                $shipp = shipping::where('id',$order->shepping_id)->get();
                $product_deteils = product_deteils::where('order_id',$order->id)->get();
                //return view ('layouts.allpage.order_invoice_view',compact('check','shipp','product_deteils'));
                $pdf = PDF::loadView('layouts.allpage.invoice_download',compact('check','shipp','product_deteils'));
	             return $pdf->stream('document.pdf');
             }

}
