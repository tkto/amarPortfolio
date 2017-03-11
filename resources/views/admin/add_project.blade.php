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


  ?>
</h6>
<div class="col-md-12">
  <div class="card">
   <div class="content">

    {!! Form::open(['url' => '/save-project','method'=>'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data']) !!}

    <fieldset>

      <!-- Form Name -->
      <legend>Add Project</legend>


      <!-- Text input-->
      <div class="form-group">
      <label class="col-md-4 control-label" >Project Name</label>  
        <div class="col-md-4">
          <input id="project_name" name="project_name" type="text" placeholder="Project Name" class="form-control input-md" required="">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" >Client Name</label>  
        <div class="col-md-4">
          <input id="client_name" name="client_name" type="text" placeholder="Client Name" class="form-control input-md" required="">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" >Project URL</label>  
        <div class="col-md-4">
          <input id="project_url" name="project_url" type="text" placeholder="Project URL" class="form-control input-md" >

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" >Post short Description</label>  
        <div class="col-md-4">

         <textarea class="form-control" d="project_description" name="project_description" rows="2" placeholder="Project  Description:"></textarea>
       </div>
     </div>



     <!-- Select Basic -->
     <div class="form-group">
      <label class="col-md-4 control-label" for="blood_group">Publication Status</label>
      <div class="col-md-4">
        <select id="publication_status" name="publication_status" class="form-control">
          <option value="-1">Select</option>
          <option value="1">Published</option>
          <option value="0">Un Published</option>

        </select>
      </div>
    </div>
    <div class="col-md-12"> 
      <div class="form-group">
        <label class="col-sm-4 control-label" for="filebutton">Upload File :  **jpg/jpeg/gif/png/txt/doc/xlsx/pdf/rar/zip format(File Max:3M)**</label>
        <div class="col-sm-8">
          <input name="project_image" id="project_image" class="input-file" type="file">
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
  {!! Form::close() !!}

</div>
</div>
</div>
</div>
@endsection


