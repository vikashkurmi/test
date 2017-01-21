<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests;
use App\Customer;

class MyController extends Controller
{
    public function myPage(){

    	// $customer = new Customer();  // selected database table check.
    	// dd($customer);

    	// $customer = Customer::all();	// selection of all data on databse.
    	// dd($customer); 

    	// $customer = new Customer;				// Insertion Data on Database.
    	// $customer->user_first_name = 'Test';
    	// $customer->user_last_name = 'Test';
    	// $customer->save();
    	// dd($customer);

    //----------  Data insert in Database  ----------//

    	// $customer = new Customer([
    	// 	'user_first_name' => 'txt',
    	// 	'user_last_name' => 'type',
    	// 	'user_email' => 'test@gmail.com',
    	// 	'user_password' => '12121'
    	// 	]);

    	// $customer->save();

    	// Customer::destroy(8);		// Delete a selected row in database.

    	// $data = Customer::find(9);		// Selected find a Data row in database.
    	// echo "<pre>"; print_r($data);
    	

    	return view('registration');

    	//echo "Successfull";
    }

    public function RegistrationData(Request $request) {
    	$this->validate($request, [
    		'user_first_name' => 'required|unique:post|max:10',
    		'user_last_name' => 'required|unique:post|max:10'
    		]);
    	
    }

}
	