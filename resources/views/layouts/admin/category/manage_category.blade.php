@extends('layouts.admin.dashboard')
@section('title')
    Manage Category
@endsection
@section('dashboard_body')
    <div class="container bcontent">
        <h2>MANAGE CATEGORY </h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr class="bg-primary text-light">
                    <th>Sl No </th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Publish status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                    foreach($getCategory as $category){?>
                 <tr>
                     <td class="bg-primary text-light"><?php echo $category->id ?></td>
                     <td><?php echo $category->category_name ?></td>
                     <td><?php
                           $sub = $category->category_description;
                            $ans = substr("$sub",10);
                            echo $ans;
                         ?></td>
                     <td>
                         <?php
                           if($category->publication_status == 1){?>
                                 published
                          <?php
                           }else{?>
                               unpublished
                          <?php
                           }
                         ?>
                     </td>
                     <td><?php echo $category->created_at?></td>
                     <td>
                         <div class="btn-group">
                              <?php
                                 if($category->publication_status == 1){?>
                                     <a href="{{route('unpublish',$category->id)}}" class="btn btn-outline-info">Unpublish</a>
                                 <?php
                                 }else{?>
                                  <a href="{{route('publish',$category->id)}}" class="btn btn-outline-info">publish</a>
                                  <?php
                                 }
                             ?>

                             <a href="{{route('destroy',$category->id)}}" class="btn btn-outline-danger" id="delete">Delete</a>
                             <a href="{{route('edit_category',$category->id)}}" class="btn btn-outline-primary">Edit</a>
                         </div>
                     </td>
                 </tr>
                   <?php
                    }
                 ?>



                </tbody>
            </table>
        </div>
        {{$getCategory->links()}}
    </div>
    </body>
    </html>
@endsection

