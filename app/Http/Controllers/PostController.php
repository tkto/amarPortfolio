<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use DB;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

          $posts = Post::all();
        $home_content = view('pages.post_view')->with('posts',$posts);
        $category = view('partials.category');
        return view('master')->with('content',$home_content)->with('category',$category);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_category = DB::table('tbl_category')->distinct()->get();
  $tags = Tag::all();
       $admin_home_content = view('admin.add_post')->with('all_category',$all_category)->withTags($tags);
      return view('admin.admin_master')->with('admin_content',$admin_home_content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //details as print_r 
//dd($request);
          //validate data
        $this->validate($request,array(
            'category_id'=>'required',
            'blog_title'=>'required|max:255',
            'blog_short_description'=>'required',
            'blog_long_description'=>'required',
            'publication_status'=>'required',
            'blog_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
            ));


        //store data to db
        $post = new Post;
        $post->category_id = $request->category_id;
        $post->blog_title = $request->blog_title;
        $post->blog_short_description = $request->blog_short_description;
        $post->blog_long_description = $request->blog_long_description;
        $post->publication_status = $request->publication_status;

        //image code start
        $imageName = time().'.'.$request->blog_image->getClientOriginalExtension();
        $request->blog_image->move(public_path('img/'), $imageName);

        $post->blog_image = $imageName;
        // image code end

        $post->save();
 $post->tags()->sync($request->tag_name,false);

        Session::flash('success','Post successfully saved');

        //redirect to another page

        $all_category = DB::table('tbl_category')->distinct()->get();
         $tags = Tag::all();
        $admin_home_content = view('admin.add_post')->with('all_category',$all_category)->withTags($tags);
        return view('admin.admin_master')->with('admin_content',$admin_home_content);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

 $posts = DB::table('posts')->where('blog_id', '=', $id)->get();
        //$post = Post::find($id);        
        $home_content = view('pages.single_post')->with('posts',$posts);
        $category = view('partials.category');
        return view('master')->with('content',$home_content)->with('category',$category);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        //$posts = DB::table('posts')->where('blog_id', '=', $id)->get();
        $posts = Post::find($id);
    $all_category = DB::table('tbl_category')->distinct()->get();
       $admin_home_content = view('admin.edit_post')->with('posts',$posts)->with('all_category',$all_category);
      return view('admin.admin_master')->with('admin_content',$admin_home_content);




   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
           //validate data
        $this->validate($request,array(
            'category_id'=>'required',
            'blog_title'=>'required|max:255',
            'blog_short_description'=>'required',
            'blog_long_description'=>'required',
            'publication_status'=>'required',
            'blog_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
            ));



        //store data to db
        $post = Post::findOrFail($id);
        $post->category_id = $request->category_id;
        $post->blog_title = $request->blog_title;
        $post->blog_short_description = $request->blog_short_description;
        $post->blog_long_description = $request->blog_long_description;
        $post->publication_status = $request->publication_status;

        //image code start
        $imageName = time().'.'.$request->blog_image->getClientOriginalExtension();
        $request->blog_image->move(public_path('img/'), $imageName);

        $post->blog_image = $imageName;
        // image code end

        $post->save();
        Session::flash('success','Post successfully saved');

        //redirect to another page

     


      $home_content = view('pages.single_post');
        $category = view('partials.category');
        return view('master')->with('content',$home_content)->with('category',$category);



       // return "hello";
       // exit();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
     $post = DB::table('posts')->where('blog_id', '=', $id)->get();
        $post->delete();

return redirect('/manage-post');

    }


    //custom function start
public function managePost(){

 
    //$all_category = DB::table('tbl_category')->distinct()->get();
 $posts = Post::all();
$admin_home_content = view('admin.manage_post')->with('posts',$posts);
      return view('admin.admin_master')->with('admin_content',$admin_home_content);
}

   //custom function end here

}
