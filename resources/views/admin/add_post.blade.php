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
 
  {!! Form::open(['route' => 'post.store','method'=>'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data']) !!}
             
                <fieldset>

                    <!-- Form Name -->
                    <legend>Add Post</legend>
  <!-- Select Basic -->
              <div class="form-group">
                  <label class="col-md-4 control-label" >Category Name</label>
                  <div class="col-md-4">
                    <select id="category_id" name="category_id" class="form-control">
                      <option value="-1">Select</option>
                      @foreach ($all_category as $category)
                      <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                      @endforeach
           
                  </select>
              </div>
          </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" >Post Name</label>  
                      <div class="col-md-4">
                          <input id="blog_title" name="blog_title" type="text" placeholder="Post Name" class="form-control input-md" required="">

                      </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                      <label class="col-md-4 control-label" >Post short Description</label>  
                      <div class="col-md-4">
                     
 <textarea class="form-control" d="blog_short_description" name="blog_short_description" rows="2" placeholder="Post Short Description:"></textarea>
                      </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                      <label class="col-md-4 control-label" >Post Long Description</label>  
                      <div class="col-md-4">
                     
 <textarea class="form-control" d="blog_long_description" name="blog_long_description" rows="2" placeholder="Post Long Description:"></textarea>
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
      <input name="blog_image" id="blog_image" class="input-file" type="file">
    </div>
  </div>

</div>


 <!-- Select Basic -->

<div class="form-group">
    <label class="col-md-4 control-label" for="rolename">Tags</label>
    <div class="col-md-4">
      <select multiple class="form-control" id="tag_name" name="tag_name[]">
        @foreach ($tags as $tag)
                      <option value="{{$tag->id}}">{{$tag->name}}</option>
                      @endforeach

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


