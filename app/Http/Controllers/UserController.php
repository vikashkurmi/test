<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Validator;
use Image; 
// 'Image' => 'Intervention\Image\Facades\Image'
// use Intervention\Image\Facades\Image;


class UserController extends Controller
{

	public function index() {
       
		return view('home');
	}


    public function RegistrationData(Request $request){

        $this->validate($request, [
            
            'name'=>'required|max:255',

            'user_email'=>'required|max:255',

            'user_password'=>'required|max:25',

            'password_confirmation' => 'required|max:25'
        ]);

    	$email = $request->input('user_email');

    	$password = $request->input('user_password');

        $password2 = $request->input('password_confirmation');

        if($password == $password2){

            $user_data = User::where('user_email', '=', $request->input('user_email'))->first();

            if($user_data){

                //$data_error = array('password_error' => 'Your Email is already exists Please Check.');
                \Session::flash('registration', 'Your Email is already exists Please Check.!');

                return redirect('register');
            }

            $user_data = array('user_email' => $email, 'user_password' => $password );

            $user_data = new User([
                'user_email' => $request->input('user_email'),
                'user_password' => $request->input('user_password')
            ]);

            $insert_data = $user_data->save();

            if($insert_data){

                \Session::flash('registration', 'Thankyou! Your Registration Successfully.');

                return redirect('register');
            }

        }else{

            //$password_error = array('password_error' => 'Your Password Does Not Match Please Conform.');
             \Session::flash('registration', 'Your Password Does Not Match Please Conform!');

            return redirect('register');
        }

    }

    public function UserLogin(Request $request){

        $this->validate($request, [
            'user_email'=>'required|max:255',
            'user_password'=>'required|max:255'
        ]);
    	
        $user_email = $request->input('user_email');
        $user_password = $request->input('user_password');
       
        $user_data = User::where('user_email', '=', $request->input('user_email'))->first();

        if($user_data == ""){
            \Session::flash('login', 'Your Email is Not Registred.');
            return redirect('login');
        }

        $log_data = User::where('user_email', '=', $request->input('user_email','user_password', '=', $request->input('user_password')))->get();
        // echo dd($log_data);
        // \Session::put('name', 'Vikas');
        // echo \Session::get('name');

        \Session::push('user_data', $log_data);
        $data = \Session::get('user_data');
        //echo "<pre>"; print_r($data);  die('sdfs');
       
        if($log_data){

           \Session::flash('login', 'Logged in Successfully.');
           return redirect('gallery');         
        }        
    }

    public function gallery(Request $request){

        if(\Session::has('user_data') ==''){
           
           return redirect('UserController');
           
        }

        // $gallery_data = Gallery::get();
        $gallery_data = Gallery::orderBy('id', 'DESC')->get();
        $gallery_data = Gallery::paginate(9);
        // dd($gallery_data);
        return view('gallery', compact('gallery_data'));
    }

    public function ImageData(Request $request){

         if(\Session::has('user_data') ==''){
           
           return redirect('UserController');
           
        }
        
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'file' => 'required'
            ]);


        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $destinationPath = base_path('public/assets/image/thumb/');
        $thumb_img = Image::make($file->getRealPath())->resize(350, 260);
        $thumb_img->save($destinationPath.'/'.$filename);
        $destinationPath = base_path('/public/assets/image');
        $file->move($destinationPath, $filename);



        /*
        $file = $request->file('file');
        $path = base_path().'/public/assets/image';
        $filename = $file->getClientOriginalName();
        $request->file('file')->move($path, $filename);
        */


        // $file->move(base_path().'/public/assets/image/', $file);      
        // dd('sfdsd');

        // $file = $request->file('file');
        // $filename  = time() . '.' . $file->getClientOriginalExtension();
        // $path = base_path('/public/assets/image/thumb' . $filename);
        // Image::make($file->getRealPath())->resize(200, 200)->save($path);
        // $user->image = $filename;
        // $user->save();

        $gallery_data = new Gallery([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $filename
            ]);

        $insert_data = $gallery_data->save();

        if($insert_data){

            $gallery_data = Gallery::get();

            return redirect('gallery');
        }

    }

    public function Logout(Request $request){
        $data = \Session::get('user_data');
        if($data){
            Session::flush('user_data');
            // \Session::flush();
            return redirect('login');
            // return view('auth.login');
        }
        // dd($data);
        return redirect('UserController');
    }

}

