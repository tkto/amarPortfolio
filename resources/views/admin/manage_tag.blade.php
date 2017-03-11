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
      <h4>Mange Tag</h4>
      <table class="table">
        <thead>
          <tr>
            <th>Tag Name</th>
        
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
          <tr>
            <td>{{$tag->name}}</td>
       

            <td>

            <a href="{{URL::to('/delete-category/'.$tag->id)}}" onclick="return checkDelete();"> <button type="button" class="btn btn-info" >Delete</button></a>  


              <a href=""> <button type="button" class="btn btn-info">Edit</button></a>      
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