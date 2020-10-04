@extends('layouts.admin.dashboard')
@section('title')
dexcel ecommerce invoice
    @endsection
@section('dashboard_body')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>dexcel ecommerce invoice </title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
</head>
<body>
    <div class="container">
        <div class="card">
            @foreach($check as $checkout_value)
            <div class="card-header bg-dark text-light">
                Invoice Date :
                <strong class="text-light">{{ $checkout_value->created_at }}</strong>

            </div>
            @endforeach
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">customer information :</h6>
                        @foreach($check as $checkout_value)
                        <div>
                            <strong>{{ $checkout_value->first_name }}  {{ $checkout_value->last_name }}</strong>
                        </div>
                        <div>{{ $checkout_value->email }}</div>
                        <div>{{ $checkout_value->phone }}</div>
                        <div>{{ $checkout_value->created_at }}</div>
                        <div>{{ $checkout_value->address }}</div>
                        @endforeach
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-3">shepping information :</h6>
                        @foreach($shipp as $shipping_value)
                        <div>
                            <strong>{{ $shipping_value->full_name }}</strong>
                        </div>
                        <div>{{ $shipping_value->email }}</div>
                        <div>{{ $shipping_value->phone }}</div>
                        <div>{{ $shipping_value->created_at}}</div>
                        <div>{{ $shipping_value->address }}</div>
                        @endforeach
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">product id </th>
                                <th>product name </th>
                                <th>product price </th>
                                <th class="right">product quantity </th>
                                <th class="right">Total price </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product_deteils as $product)
                            <tr>
                                <td class="center">{{ $product->product_id }}</td>
                                <td class="left">{{ $product->product_name }}</td>
                                <td class="left">${{ $product->product_price  }}</td>
                                <td class="center">{{ $product->product_quantity }}</td>
                                <td class="right">${{ $product->product_price * $product->product_quantity }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>

                                <tr>
                                    <td class="left">
                                        <strong>Discount </strong>
                                    </td>
                                    <td class="right">$0</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>VAT
										</strong>
                                    </td>
                                    <td class="right">$0</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>${{ $product->product_price * $product->product_quantity }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@endsection
