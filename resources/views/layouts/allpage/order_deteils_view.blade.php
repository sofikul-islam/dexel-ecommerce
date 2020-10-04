@extends('layouts.admin.dashboard')
@section('title')
    order view
    @endsection
@section('dashboard_body')

<div class="container">


    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mb-4">
                    <h2 class="text-center">Order info for this order</h2>
                <table class="table table-hover table-bordered ">
                    @foreach ($order_info as $info)
                        <tr>
                            <th>Order No</th>
                            <td>{{ $info->id }}</td>
                        </tr>
                        <tr>
                            <th>Ordet Total </th>
                            <td>$ {{ $info->total_price }}</td>
                        </tr>
                        <tr>
                            <th>Order Status  </th>
                            <td>{{ $info->order_status }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status  </th>
                            <td>{{ $info->payment_status }}</td>
                        </tr>
                        <tr>
                            <th>Payment type  </th>
                            <td>{{ $info->payment_type }}</td>
                        </tr>
                        <tr>
                            <th>Order Date </th>
                            <td>{{ $info->created_at }}</td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto mb-4">
                    <h2 class="text-center">Customer info for this order</h2>
                <table class="table table-hover table-bordered ">
                    @foreach($check as $check_value)
                        <tr>
                            <th>Customer Name </th>
                            <td>{{ $check_value->first_name }}  {{ $check_value->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number </th>
                            <td>{{ $check_value->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email Address </th>
                            <td>{{ $check_value->email }}</td>
                        </tr>
                        <tr>
                            <th>Address </th>
                            <td>{{ $check_value->address }}</td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto mb-4">
                    <h2 class="text-center">Shipping info for this order</h2>
                <table class="table table-hover table-bordered ">
                     @foreach($shipp as $shipp_value)
                        <tr>
                            <th>Full Name </th>
                            <td>{{ $shipp_value->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number </th>
                            <td>{{ $shipp_value->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email Address </th>
                            <td>{{ $shipp_value->email }}</td>
                        </tr>
                        <tr>
                            <th>Address </th>
                            <td>{{ $shipp_value->address }}</td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
        <div class="row">
                <div class="col-md-12 mb-5">
                        <h2 class="text-center">Product info for this order</h2>
                    <table class="table table-hover table-bordered ">
                        <thead class="thead-light">
                            <tr>

                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product photo</th>
                                <th>Product Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product_deteils as $product_value)
                                <tr>

                                    <td>{{ $product_value->id }}</td>
                                    <td>{{ $product_value->product_name }}</td>
                                    <td> ${{ $product_value->product_price }}</td>
                                    <td><img src="{{ $product_value->product_image }}" alt="" width="80" height="80"></td>
                                    <td>{{ $product_value->product_quantity }}</td>
                                    <td>${{ $product_value->product_price * $product_value->product_quantity }}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div>


@endsection
