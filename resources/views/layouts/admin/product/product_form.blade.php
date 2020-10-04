@extends('layouts.admin.dashboard')
@section('title')
    Add product
@endsection
@section('dashboard_body')
    <div class="container">
        <h2>ADD NEW PRODUCT </h2>
        <form action="{{route('product_save')}}" method="POST" name="form_name" enctype="multipart/form-data" >
            @csrf
             <label for="product_name">Product Name : </label><br/>
             <input type="text" placeholder="enter product name" value="{{old('product_name')}}" name="product_name" class="form-control" id="product_name"/>
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
                  @foreach($category as $cat)

                  <option value="{{$cat->id}}">{{$cat->category_name}}</option>
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
            {{old('short_description')}}
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
             {{old('long_description')}}
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
            <label for="images">upload image : </label>
            <input type="file" name="image" class="form-control" id="images">
            <?php
            if($errors->has('image')){
                 foreach($errors->get('image') as $error){?>
                      <span class="text-danger"><?php echo $error ?></span>
                 <?php
                 }
            }
          ?>

            <br/>
            <label for="product_name">Product Price : </label><br/>
            <input type="text" placeholder="enter product price" value="{{old('price')}}" name="price" class="form-control" id="product_name"/>
            <?php
            if($errors->has('price')){
            foreach($errors->get('price') as $error){?>
            <span class="text-danger"><?php echo $error ?></span>
            <?php
            }
            }
            ?>
            <br/>
            <input type="radio" name="publication_status"  value="1"> Publish
            <input type="radio" name="publication_status" value="0"> UnPublish<br/>
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
    </div>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
    <script>
          document.forms['form_name'].elements['product_category_id'].value={{old('product_category_id')}};
    </script>

@endsection

