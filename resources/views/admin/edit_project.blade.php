@extends('admin.admin_master')
@section('admin_content')


<div class="row">
  <h6 class="text-center login-title text-warning bg-warning">
   <?php
   $success = Session::get('success');
   if($success){
    echo $success;
    Session::put('success',null);
  }

{{URL::to('/delete-category/'.$category->category_id)}}
  ?>
</h6>
<div class="col-md-12">
  <div class="card">
   <div class="content">

    {!! Form::open(['URL' => '/update-project'.$,'method'=>'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data']) !!}
    @foreach ($posts as $post)
    <fieldset>

      <!-- Form Name -->
      <legend>Edit Project</legend>
    

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" >Post Name</label>  
        <div class="col-md-4">
          <input id="blog_title" name="blog_title" type="text" value="{{$post->project_name}}" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" >Post short Description</label>  
        <div class="col-md-4">

         <textarea class="form-control" d="blog_short_description" name="blog_short_description" rows="3" >{{$post->project_description}}</textarea>
       </div>
     </div>

 

   <!-- Select Basic -->
   <div class="form-group">
    <label class="col-md-4 control-label" for="blood_group">Publication Status</label>
    <div class="col-md-4">
    <select id="publication_status" name="publication_status" class="form-control">      

        @if ($post->publication_status == 1)
        <option value="1" selected="">Published</option>
        <option value="0">Un Published</option>
        @else
        <option value="1" >Published</option>
        <option value="0" selected="">Un Published</option>
        @endif
      </select>
    </div>
  </div>
  <div class="col-md-12"> 
    <div class="form-group">
      <label class="col-sm-4 control-label" for="filebutton">Upload File :  **jpg/jpeg/gif/png/txt/doc/xlsx/pdf/rar/zip format(File Max:3M)**</label>
      <div class="col-sm-8">
        <input name="blog_image" id="blog_image" class="input-file" type="file">
      </div>
    </div>

  </div>
  <!-- Button Submit -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-2">
      <button id="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>

</fieldset>
@endforeach
{!! Form::close() !!}

</div>
</div>
</div>
</div>
@endsection


