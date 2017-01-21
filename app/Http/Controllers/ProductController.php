<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as v;
use Illuminate\Database\Capsule\Manager as DB;
//use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use App\Product;
use Illuminate\Support\Facades\Session;
use Validator;
class ProductController extends Controller
{
    public function myView(Request $request){

	// $request->all();
    	// $product = new Product([
    	// 		'name' => 'guarded name',
    	// 		'description' => 'test new',
    	// 	]);

    	// $product->save();

    	// dd($product);
    	//return view('myview');
        $request->session()->flash('message', 'Task was successful!');
        // Session::flash('message', 'Registration Form.');
        $data = array('name'=>'test', 'email'=>'test@gmail.com');
        //return view('child', ['name' => 'Vikas'], $data);
        return view('myview', ['name' => 'Vikas'])->with('data', $data);
    }


    public function registrationData(Request $request){
            $product = Product::get();
            return view('products.product_list')->with('product', $product);
    }


    public function registrationData1(Request $request){

        // $file = $request->file('image');
        // $destinationPath = base_path().'resources/assets/image';
        // $filename        = time() . '_' . $file->getClientOriginalName();
        // $filename = str_replace(' ','_',$filename);
        // $request->file('image')->move($destinationPath, $filename);
        // //$uploadSuccess   = $file->move($destinationPath, $filename);
        // dd($request);
      
    //     dd($file);

    //     $extension = $file->getClientOriginalExtension();
    //     Storage::disk('http://localhost/blog1/resources/assets/image/')->put($file->getFilename().'.'.$extension,  File::get($file));
    //     $entry = new Fileentry();
    //     $entry->mime = $file->getClientMimeType();
    //     $entry->original_filename = $file->getClientOriginalName();
    //     $entry->filename = $file->getFilename().'.'.$extension;
    // dd($entry);
    //     $entry->save();

    	//echo "<pre>"; print_r($_REQUEST); die;
	   

    	$validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('myView')
                        ->withErrors($validator)
                        ->withInput();
        }

            // if(Input::file())
            // {  
            //     $image = Input::file('image');
            //     $filename  = time() . '.' . $image->getClientOriginalExtension();
            //     $path = public_path('assets/image/' . $filename);
            //     Image::make($image->getRealPath())->resize(200, 200)->save($path);
            //     $user->image = $filename;
            //     $user->save();
            // }
                // $image = $request->file('image'); 
                // $filename = time() . '.' . $image->getClientOriginalExtension(); 
                // Image::make($image)->resize(300, 300)->save( public_path('assests/image/' . $filename)); 
                // $user = Auth::user(); 
                // $user->image = $filename; $user->save(); 
                //return view('home');

            echo "sdfsdf"; die;

                $file = $request->file('image');
                $input = array('image' => $file);               
                $destinationPath = base_path().'/public/assets/image';
                $filename = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $request->file('image')->move($destinationPath, $file);

         	
            Session::set('first_name', $request->input('user_first_name'));
            $name = Session::get('first_name');
            Session::flush('first_name');
            echo "Session User Name is".' '.$name;

    		
    		$user_data = new Product([
    			'user_first_name' => $request->input('user_first_name'),
    			'user_last_name' => $request->input('user_last_name'),
    			'user_email' => $request->input('user_email'),
    			'user_mobile' => $request->input('user_mobile'),
    			'user_password' => $request->input('user_password'),
                'user_image' => $filename
    		]);

    		$insert_data = $user_data->save();

    	if($insert_data){

    	 	echo "Successfully Data Inserted.";
    	}    	
    }

    public function productListing(Request $request){
        if(\Session::has('user_data') == ''){

            return redirect('UserController');
        }
        
        $product = Product::get();
        return view('product_listing')->with('product', $product);
        // echo '<pre>'; print_r($product);
    }

    public function userDelete($id){
        echo $id;
       
        if($id !=''){

            $delete_user = Product::where('user_id', '=', $id)->delete();

        }else{

            echo "No data Found";
        }       

        if($delete_user){           

             return redirect('productListing');
        }

        echo "Errors";
    }


    public function editUser($id){
       
        $user_data = Product::where('user_id', '=', $id)->first();
        //echo "<pre>"; print_r($user_data);
        return view('edit_user')->with('user_data', $user_data);
        
    }

    public function editUserData(Request $request){

        $user_id = $request->input('user_id');
        $first_name = $request->input('user_first_name');
        $last_name = $request->input('user_last_name');
        $email = $request->input('user_email');
        $mobile = $request->input('user_mobile');

        $user_data = array([
            'user_first_name' => $first_name,
            'user_last_name' => $last_name,
            'user_email' => $email,
            'user_mobile' => $mobile
            ]);

        $update_status = Product::where('user_id', $user_id)->update([
            'user_first_name' => $first_name,
            'user_last_name' => $last_name,
            'user_email' => $email,
            'user_mobile' => $mobile
            ]);

        if($update_status){

            return redirect('productListing');
        }
        echo "Data Updation Error.";
               
    }

}
