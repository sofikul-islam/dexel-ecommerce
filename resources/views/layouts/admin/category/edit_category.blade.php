@extends('layouts.admin.dashboard')
@section('title')
    edit category
@endsection
@section('dashboard_body')
    <div class="container">
        <h2>Edit category </h2>
        @foreach($getdata as $data)
        <form action="{{route('update.category',$data->id)}}" method="POST">
            @csrf

            <input type="text" name="category_name" value="{{$data->category_name}}" class="form-control">
            <?php
            if($errors->has('category_name')){
            foreach($errors->get('category_name') as $error){?>
            <span style="color:red"><?php echo $error?></span>
            <?php
            }
            }
            ?><br/>
            <textarea  id="" cols="30" rows="10" class="form-control" name="category_description">
                {{$data->category_description}}
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
            <input type="radio" name="publication_status" <?php
                if($data->publication_status == 1){?>
                     checked
                <?php
                }
            ?> value="1"> Publish<br/>
            <input type="radio" name="publication_status" <?php
              if($data->publication_status == 0){?>
                    checked
              <?php
              }
            ?>value="0"> UnPublish<br/>
            <?php
            if($errors->has('publication_status')){
            foreach($errors->get('publication_status') as $error){?>
            <span style="color:red"><?php echo $error?></span>
            <?php
            }
            }
            ?>
            <br/>

            <input type="submit" class="btn btn-info" value="Edit category ">

        </form>
        @endforeach
    </div>
@endsection

