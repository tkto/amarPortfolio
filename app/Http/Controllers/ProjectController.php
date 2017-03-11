<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = DB::table('tbl_project')->distinct()->get();
        $home_content = view('pages.all_project_view')->with('posts',$posts);
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
      
       $admin_home_content = view('admin.add_project');
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
         //validate data
        $this->validate($request,array(
            'project_name'=>'required',
        
            'project_description'=>'required',
            'client_name'=>'required',
            'publication_status'=>'required',
            'project_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
            ));


        //receive data through request file 
        $data = array();
$data['project_name']=$request->project_name;
 $data['project_description']=$request->project_description; 
  $data['project_url']=$request->project_url;
 $data['publication_status']=$request->publication_status;
$data['created_at'] = \Carbon\Carbon::now();
    $data['updated_at'] = \Carbon\Carbon::now();

        //image code start
$image = $request->file('project_image');


        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('img/'), $imageName);

        $data['project_image'] = $imageName;
        // image code end



//receive data into db
    DB::table('tbl_project')->insert($data);
  Session::put('success','The blog post successfully saved');
return redirect('/create-portfolio');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = DB::table('tbl_project')->where('id', '=', $id)->get();
        //$post = Post::find($id);        
        $home_content = view('pages.single_project')->with('posts',$posts);
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
       
        $posts = DB::table('tbl_project')->where('id', '=', $id)->get();

       $admin_home_content = view('admin.edit_project')->with('posts',$posts);
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
            'project_name'=>'required',
        
            'project_description'=>'required',
            'client_name'=>'required',
            'publication_status'=>'required',
            'project_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
            ));
///

   //receive data through request file 
        $data = array();
$data['project_name']=$request->project_name;
 $data['project_description']=$request->project_description; 
  $data['project_url']=$request->project_url;
 $data['publication_status']=$request->publication_status;
$data['created_at'] = \Carbon\Carbon::now();
    $data['updated_at'] = \Carbon\Carbon::now();

        //image code start
$image = $request->file('project_image');


        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('img/'), $imageName);

        $data['project_image'] = $imageName;
        // image code end
DB::table('tbl_project')
            ->where('id', $id)
            ->update($data);
return redirect('/portfolio/{$id}');
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
    }
}
