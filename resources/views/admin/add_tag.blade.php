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
   
  {!! Form::open(['route' => 'tag.store','method'=>'POST','class' => 'form-horizontal']) !!}
             
                <fieldset>

                    <!-- Form Name -->
                    <legend>Add Tag</legend>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" >Tag Name</label>  
                      <div class="col-md-4">
                          <input id="tag_name" name="tag_name" type="text" placeholder="Tag Name" class="form-control input-md" required="">

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


