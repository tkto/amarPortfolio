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
  {!! Form::open(['url' => '/save-category','method'=>'POST','class' => 'form-horizontal']) !!}
             
                <fieldset>

                    <!-- Form Name -->
                    <legend>Add Category</legend>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" >Category Name</label>  
                      <div class="col-md-4">
                          <input id="category_name" name="category_name" type="text" placeholder="Category Name" class="form-control input-md" required="">

                      </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                      <label class="col-md-4 control-label" >Category Description</label>  
                      <div class="col-md-4">
                     
 <textarea class="form-control" d="category_description" name="category_description" rows="2" placeholder="Description:"></textarea>
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


