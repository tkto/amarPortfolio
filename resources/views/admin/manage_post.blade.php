@extends('admin.admin_master')
@section('admin_content')

<script type="text/javascript">
  function checkDelete(){
    chk = confirm("are u sure want to delete?");
    if(chk){
      return true;
    }else{
      return false;
    }
  }
</script>
<div class="row">

  <div class="col-md-12">
    <div class="card">
     <div class="content">
      <h4>Mange Post</h4>
      <table class="table">
        <thead>
          <tr>
            <th>Category Name</th>
            <th>Publication Status</th>  
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <td>{{$post->blog_title}}</td>
            <td><?php
                                if ($post->publication_status == 1) {
                                    echo "Published";
                                } else {
                                    echo "Unpublished";
                                }
                                ?></td>

            <td>

            <a href="{{route('post.destroy',$post->blog_id)}}" onclick="return checkDelete();"> <button type="button" class="btn btn-info" >Delete</button></a>  


              <a href="{{route('post.edit',$post->blog_id)}}"> <button type="button" class="btn btn-info">Edit</button></a>      
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection