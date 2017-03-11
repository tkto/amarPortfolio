<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
class SuperAdminController extends Controller
{
    //

    public function index(){

$admin_home_content = view('admin.admin_home');
    
 return view('admin.admin_master')->with('admin_content',$admin_home_content);
  
    }

    
      public function getLogout(){
 Session::put('admin_name',null);
  Session::put('message',"Successfully Logout");
      return view('admin/login');
    }


    
      public function addCategory(){
$admin_home_content = view('admin.add_category');
      return view('admin.admin_master')->with('admin_content',$admin_home_content);
    }

    

 public function saveCategory(Request $request){
$data = array();
$data['category_name']=$request->category_name;
 $data['category_description']=$request->category_description;
 $data['publication_status']=$request->publication_status;
$data['created_at'] = \Carbon\Carbon::now();
    $data['updated_at'] = \Carbon\Carbon::now();

DB::table('tbl_category')->insert($data);
  Session::put('success','The blog post successfully saved');
return redirect('/add-category');






/*  $this->validate($request,array(
            'category_name'=>'required|max:255',
             'category_description'=>'required|max:255',
            'publication_status'=>'required'
            ));
        //store data to db
        $post = new Post;
        $post->category_name = $request->category_name;
        $post->category_description = $request->category_description;
        $post->publication_status = $request->publication_status;
        $post->save();
        Session::put('success','The blog post successfully saved');

        //redirect to another page

        return redirect('/add-category');*/




}


 public function manageCategory(){

$all_category = DB::table('tbl_category')->distinct()->get();

$admin_home_content = view('admin.manage_category')->with('all_category',$all_category);
      return view('admin.admin_master')->with('admin_content',$admin_home_content);

 }

 public function deleteCategory($id){

DB::table('tbl_category')->where('category_id', '=', $id)->delete();
$all_category = DB::table('tbl_category')->distinct()->get();
$admin_home_content = view('admin.manage_category')->with('all_category',$all_category);
      return view('admin.admin_master')->with('admin_content',$admin_home_content);

 }



 public function saveBlog(Request $request){

    
    DB::table('tbl_blog')->insert(
    ['category_id' => 'john@example.com', 'blog_title' => 0,'blog_short_description' => 0,'blog_long_description' => 0,'publication_status' => 0,'blog_image' => 0,]
);
}


}//end class
