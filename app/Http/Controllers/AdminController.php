<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests;
use App\Admin;
use App\Gallery;
use App\User;
use paginate;
use File;
use Image;
use PDF;
// use GMaps;
// use Barryvdh\DomPDF\Facade as PDF;

class AdminController extends Controller
{
    public function index(){

    	return view('admin.login');

    }

    public function userLogin(Request $request){

        $this->validate($request, [

            'user_email'=>'required|max:255',
            'user_password'=>'required|max:255'
        ]);
        
        $user_email = $request->input('user_email');
        $user_password = $request->input('user_password');
       
        $user_data = Admin::where('user_email', '=', $request->input('user_email'))->first();

        if($user_data == ""){
            \Session::flash('login', 'Your Email is Not Registred.');
            return redirect('Admin')->withInput();
        }

        $log_data = Admin::where(['user_email' => $request->input('user_email'),'user_password' => $request->input('user_password')])->first();
        // echo "<pre>"; print_r($log_data); die('asd');
        \Session::push('user_data', $log_data);

        $data = \Session::get('user_data');       
       
        if($log_data){
           \Session::flash('login', 'Logged in Successfully.');
           return redirect('dashboard');         
        }     
    }


    public function dashboard(){

        if(\Session::has('user_data') ==''){
           
           return redirect('Admin');           
        }

        return view('layouts.admin_master');    
    }


    public function logout(Request $request){

        $data = \Session::get('user_data');

        if($data){

            \Session::flush('user_data');
           
            return redirect('Admin');
        }
        
        return redirect('Admin'); 
    }


   public function galleryListing(Request $request){

        if(\Session::has('user_data') ==''){
           
           return redirect('Admin');           
        }

        $gallery_data = Gallery::orderBy('id', 'desc')->get();
        $gallery_data = Gallery::paginate(10);
        // $gallery_data = Gallery::where('id', '>', 5)->paginate(15);
        //$gallery_data = Gallery::paginate(15);
        return view('admin.gallery_listing', compact('gallery_data'));
   }


      public function deleteGallery($id){

        if($id !=''){

            $delete_gallery = Gallery::where('id',$id)->delete();

        }else{

            echo "Data not Found.";
        }

        if($delete_gallery){

            return redirect('galleryListing');
        }

      }



   public function userListing(Request $request){

        if(\Session::has('user_data') == ''){

            return redirect('Admin');
        }

        $user_data = Admin::orderBy('user_id', 'desc')->get();
        $user_data = Admin::paginate(5);
        return view('admin.user_listing', compact('user_data'));
   }


   public function deleteUser($id){

    if($id !=''){

        $delete_user = Admin::where('user_id', $id)->delete();

    }else{

        echo "Data not Found.";
    }

    if($delete_user){

        return redirect('userListing');
    }

   }


   public function galleryData(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
            ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $destinationPath = base_path('public/assets/image/thumb/');
        $thumb_img = Image::make($file->getRealPath())->resize(100, 100);
        $thumb_img->save($destinationPath.'/'.$filename,80);                    
        $destinationPath = base_path('/public/assets/image');
        $file->move($destinationPath, $filename);


        // echo "<pre>"; print_r($filename); die('sdfs');

        $image_data = new Gallery([ 
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $filename
            ]);

        $insert_data = $image_data->save();

        if($insert_data){

            // return redirect('gallery_listing');
            return redirect('galleryListing');
        }
   }


   public function userData(Request $request){

        $this->validate($request, [
            'user_first_name' => 'required',
            'user_last_name' => 'required',
            'user_email' => 'required',
            'user_mobile' => 'required'
            ]);

        $user_data = new Admin([
            'user_first_name' => $request->input('user_first_name'),
            'user_last_name' => $request->input('user_last_name'),
            'user_email' => $request->input('user_email'),
            'user_mobile' => $request->input('user_mobile')
            ]);

        $insert_data = $user_data->save();

        if($insert_data){

            return redirect('userListing');
        }
   }


   public function adminEditUser1($id){
            $user_data = Admin::where('user_id', '=', $id)->first();

            return view('admin/edit_user')->with('user_data', $user_data);
   }


   public function updateUserData(Request $request){

        $this->validate($request, [
            'user_first_name' => 'required',
            'user_last_name' => 'required',
            'user_email' => 'required',
            'user_mobile' => 'required'
            ]);

        $user_update_data = [
            'user_first_name' => $request->input('user_first_name'),
            'user_last_name' => $request->input('user_last_name'),
            'user_email' => $request->input('user_email'),
            'user_mobile' => $request->input('user_mobile')
            ];

        $update = Admin::where('user_id',$request->input('user_id'))->update($user_update_data);

        if($update){

            return redirect('userListing');
        }
   }


   public function adminEditGallery($id){

        $gallery_data = Gallery::where('id', $id)->first();

        return view('admin.edit_gallery')->with('gallery_data', $gallery_data);
   }


   public function updateGalleryData(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',            
            ]);        

        if($request->file('file')){

            $file = $request->file('file');
            $input = array('file' => $file);
            $path = base_path().'/public/assets/image';
            
            $filename = $file->getClientOriginalName(); 
            // $request->file('file')->move($path, $file); 
            $file->move($path, $filename);

            $image_data =[ 
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $filename 
            ];
        }else{

            $image_data =[ 
            'title' => $request->input('title'),
            'description' => $request->input('description')           
            ];
        }        

        $update_data = Gallery::where('id', $request->input('id'))->update($image_data);

        if($update_data){

            // return redirect()->route('galleryListing');
            return redirect('galleryListing');
        }
    }

    // public function paging()
    // {
        
    //     $data = Admin::paginate(3);
    //     // echo '<pre>';print_r(count($data));die;
    //     return view('paging',compact('data'));
    // }


    public function pdfview(Request $request){
        $items = Gallery::orderBy('id', 'desc')->get();
        // $items = Gallery::paginate(5);
        view()->share('items',$items);
        if($request->has('download')){          
            $pdf = PDF::loadView('pdfview');
           
            return $pdf->download('pdfview.pdf');
        }
        return view('pdfview');
    }


    public function pdfusers(Request $request){
        $user_data = User::orderBy('user_id', 'desc')->get();
        view()->share('user_data', $user_data);
        if($request->has('download')){
            $pdf = PDF::loadView('admin.pdfusers');
            return $pdf->download('pdfusers.pdf');
        }
        return view('admin.pdfusers');
    }


    public function gmaps()
    {
        // $locations = DB::table('locations')->get();
        $locations = 0;
        return view('gmaps',compact('locations'));
    }

    


}
	