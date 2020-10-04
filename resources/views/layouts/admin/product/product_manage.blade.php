@extends('layouts.admin.dashboard')
@section('title')
    Manage Product
@endsection
@section('dashboard_body')
    <div class="container bcontent">
        <h2>MANAGE PRODUCT </h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr class="bg-primary text-light">
                    <th>Product Id </th>
                    <th>Product Name</th>
                    <th>Product Category name</th>
                    <th>Product Description</th>
                    <th>Price </th>
                    <th>Image</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    @foreach($getproduct as $product)
                    <td class="bg-primary text-light">{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->category_name}}</td>
                    <td>{{$product->short_description}}</td>
                     <td><img src="{{$product->image}}" alt="" style="width:50px;height:50px;"></td>
                    <td>{{$product->price}}</td>
                    <td>
                        @if($product->publication_status == 1)
                             Published
                        @else
                            Unpublished
                            @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <?php
                               if($product->publication_status == 1){?>
                                   <a href="{{route('product_unpublish',$product->id)}}" class="btn btn-outline-info"> Unpublish </a>
                              <?php
                               }else{?>
                                    <a href="{{route('product_publish',$product->id)}}" class="btn btn-outline-info"> publish </a>
                                <?php
                               }
                            ?>
                            <a href="{{route('delete',$product->id)}}" class="btn btn-outline-danger" id="delete">Delete</a>
                            <a href="{{route('edit',$product->id)}}" class="btn btn-outline-primary">Edit</a>
                        </div>
                    </td>
                </tr>

                @endforeach


                </tbody>
            </table>
        </div>
        {{$getproduct->links()}}
    </div>
{{--    this is recycle ben product --}}
  {{--    this is recycle ben product --}}
  <div class="container bcontent">
    <h2>RYCYCLE BEN  PRODUCT </h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr class="bg-primary text-light">
                <th>Product Id </th>
                <th>Product Name</th>
                <th>Product Category name</th>
                <th>Product Description</th>
                <th>Price </th>
                <th>Image </th>
                <th>Publication Status</th>

                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                @foreach($trashed as $trash)
                    <td class="bg-primary text-light">{{$trash->id}}</td>
                    <td>{{$trash->product_name}}</td>
                    <td>{{$trash->category_name}}</td>
                    <td>{{$trash->short_description}}</td>
                    <td>{{$trash->price}}</td>
                    <td><img src="{{$trash->image}}" alt="" style="width:70px;height:60px;"></td>
                    <td>
                        @if($trash->publication_status == 1)
                            Published
                        @else
                            Unpublished
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                        <a href="{{route('restore.delete',$trash->id)}}" class="btn btn-outline-danger" >Restore</a>
                            <a href="{{route('force.delete',$trash->id)}}" class="btn btn-outline-primary">Parmamently Delete</a>
                        </div>
                    </td>
            </tr>

            @endforeach


            </tbody>
        </table>
    </div>
    {{$trashed->links()}}
</div>

    </body>
    </html>
@endsection

