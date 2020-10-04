@extends('layouts.admin.dashboard')
@section('title')
    order view
    @endsection
@section('dashboard_body')

<div class="container">
    <h3>Order view </h3>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered ">
                <thead class="thead-light">
                    <tr>
                        <th>SN.</th>
                        <th>Customer Name </th>
                        <th>Total Price</th>
                        <th>Order Date </th>
                        <th>Payment Type </th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($order_checkout as $order_value)
                        <tr>
                            <td>{{ $order_value->id }}</td>
                            <td>{{ $order_value->first_name }} {{ $order_value->last_name }}</td>
                            <td> ${{ $order_value->total_price }}</td>
                            <td>{{ $order_value->created_at }}</td>
                            <td>{{ $order_value->payment_type }}</td>
                            <td>{{ $order_value->order_status }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-info" href="{{ route('order.deteils.view',$order_value->id) }}" title="view Order details"><i class="fas fa-info"></i></a>
                                    <a class="btn btn-success" href="{{ route('order.invoice.view',$order_value->id) }}" title="view Order Invoice"><i class="fas fa-file-invoice"></i></a>
                                    <a class="btn btn-primary" href="{{ route('invoice.download',$order_value->id) }}" title="Order Invoice Download"><i class="fas fa-file-download"></i></a>
                                    <a class="btn btn-danger" href="" title=" Order Delete"><i class="fas fa-trash-alt"></i></a>
                                    <a class="btn btn-warning" href="" title=" Order Edit"><i class="far fa-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
