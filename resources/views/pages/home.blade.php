         
         @extends('master')
         @section('content')
          <!-- Blog Entries Column -->
            <div class="col-md-9">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
   @foreach ($all_post as $post)
                <!--  Blog Post start-->
                <h2>
                    <a href="#">{{$post->blog_title}}</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="{{asset('public/img/21.jpg')}}" alt="">
                <hr>
                <p>{{substr($post->blog_short_description, 0, 100)}}{{strlen($post->blog_short_description)>100 ? "...": ""}}</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!--  Blog Post end-->
              @endforeach
          
          
           
            

  


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>


            @endsection