@extends('layouts.admin.dashboard')
@section('title')
   Edit Product
@endsection
@section('dashboard_body')
    <div class="container">
        <h2>Edit Product </h2>
        @foreach($product as $pro)
        <form action="{{route('product_edit_save',$pro->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <label for="product_name">Product Name : </label><br/>
            <input type="text" placeholder="enter product name" value="{{$pro->product_name}}" name="product_name" class="form-control" id="product_name"/>
            <?php
            if($errors->has('product_name')){
            foreach($errors->get('product_name') as $error){?>
            <span class="text-danger"><?php echo $error ?></span>
            <?php
            }
            }
            ?>
            <br/>
            <label for="product_category_ids">Select Category : </label><br/>
            <select name="product_category_id" class="form-control" id="product_category_ids">
                <option></option>

                   @foreach($cats as $category)
                    <option
                        <?php
                          if($category->id == $pro->product_category_id){?>
                               selected
                          <?php
                          }
                        ?>
                        value="{{$category->id}}">{{$category->category_name}}</option>
                      @endforeach

            </select>
            <?php
            if($errors->has('product_category_id')){
            foreach($errors->get('product_category_id') as $error){?>
            <span class="text-danger"><?php echo $error ?></span>
            <?php
            }
            }
            ?>
            <br/>
            <label for="short_description">Short Description : </label> <Br/>
            <textarea name="short_description" class="form-control" id="short_description">
              {{$pro->short_description}}
            </textarea>
            <?php
            if($errors->has('short_description')){
            foreach($errors->get('short_description') as $error){?>
            <span class="text-danger"><?php echo $error ?></span>
            <?php
            }
            }
            ?>
            <br/>
            <label for="editor">Long Description : </label>
            <textarea name="long_description" class="form-control" id="editor">
               {{$pro->long_description}}
            </textarea>
            <?php
            if($errors->has('long_description')){
            foreach($errors->get('long_description') as $error){?>
            <span class="text-danger"><?php echo $error ?></span>
            <?php
            }
            }
            ?>
            <br/>

            <label for="product_name">Product Price : </label><br/>
            <input type="text" placeholder="enter product price" value="{{$pro->price}}" name="price" class="form-control" id="product_name"/>
            <?php
            if($errors->has('price')){
            foreach($errors->get('price') as $error){?>
            <span class="text-danger"><?php echo $error ?></span>
            <?php
            }
            }
            ?>
            <br/>
            <label for="image">Edit image : </label><br/>
            <input type="file" name="photo" form="form-control" id="image"><br/>
            <?php
            if($errors->has('price')){
            foreach($errors->get('price') as $error){?>
            <span class="text-danger"><?php echo $error ?></span>
            <?php
            }
            }
            ?><br/>
            <img src="{{$pro->image}}" alt="" style="width:100px;height:90px"><br/><br/>
             <input type="hidden" name="old_image" value={{$pro->image}}>
            <input type="radio" name="publication_status"
                   <?php
                if($pro->publication_status == 1){?>
                     ehecked
                <?php
                }
            ?> value="1"> Publish
            <input type="radio" name="publication_status"
                   <?php
                     if($pro->publication_status ==0){?>
                          checked
                     <?php
                     }
                   ?>

                   value="0"> UnPublish<br/>
            <?php
            if($errors->has('publication_status')){
            foreach($errors->get('publication_status') as $error){?>
            <span class="text-danger"><?php echo $error ?></span>
            <?php
            }
            }
            ?>
            <br/>
            <input type="submit" name="submit" value="Add Product" class="btn btn-info"/>

        </form>
            @endforeach
    </div>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
    <script>

    </script>

@endsection


