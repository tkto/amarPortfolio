
         
         @extends('master')
         @section('content')
          <!-- Blog Entries Column -->



  <div class="col-md-9">
       @foreach ($posts as $post)
       <style type="text/css">.margin_bottom_{padding-bottom: 1.7em;}</style>
    <!-- Project One -->
        <div class="row margin_bottom_">
            <div class="col-md-4">
                <a href="#">             

     <img class="img-responsive" src="{{asset('public/img/'.$post->project_image)}}" alt="">

                </a>
            </div>
            <div class="col-md-8">
                <h3>{{$post->project_name}}</h3>
                <h4>Subheading</h4>
                <p>{{substr($post->project_description, 0, 100)}}{{strlen($post->project_description)>100 ? "...": ""}}</p>
                <a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->
 
   
     @endforeach
 </div>


@endsection