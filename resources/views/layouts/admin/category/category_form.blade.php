@extends('layouts.admin.dashboard')
@section('title')
     Add Category
    @endsection
@section('dashboard_body')
  <div class="container">
         <h2>ADD NEW CATEGORY </h2>
         <form action="{{route('category.store')}}" method="POST">
               @csrf
             <input type="text" name="category_name" placeholder="category name " class="form-control">
              <?php
                 if($errors->has('category_name')){
                     foreach($errors->get('category_name') as $error){?>
                         <span style="color:red"><?php echo $error ?></span>
                     <?php
                     }
                 }
               ?><br/>
             <textarea   cols="30" rows="10" class="form-control" name="category_description" id="editor">

             </textarea>
              <?php
                 if($errors->has('category_description')){
                      foreach($errors->get('category_description') as $error){?>
                           <span style="color:red"><?php echo $error?></span>
                      <?php
                      }
                 }
               ?>
             <br/>
              <input type="radio" name="publication_status" value="1"> Publish
             <input type="radio" name="publication_status" value="0"> UnPublish<br/>
             <?php
             if($errors->has('publication_status')){
             foreach($errors->get('publication_status') as $error){?>
             <span style="color:red"><?php echo $error?></span>
             <?php
             }
             }
             ?>
             <br/>

             <input type="submit" class="btn btn-info" value="Add New Category ">
         </form>
  </div>
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script>
      CKEDITOR.replace( 'editor' );
  </script>

@endsection
