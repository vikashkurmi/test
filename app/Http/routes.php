	<?php

//$app->post('/test', 'UserController:test')->setName('test');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('/user','UserController@index');
Route::post('/save_data','UserController@RegistrationData');
Route::post('/listing', 'UserController@UserListing');
Route::post('/save_data','MyController@RegistrationData');

Route::get('/', function () {
    return view('home');
});

Route::get('myView', ['uses' => 'ProductController@myView']);
//Route::get('registration', ['uses' => 'ProductController@registrationData']);
Route::get('mypage', 'MyController@myPage');


Route::group(['middleware' => ['web']], function () {
	Route::post('registrationData1', 'ProductController@registrationData1');
	Route::post('/editUserData', 'ProductController@editUserData');
});

Route::get('productListing', 'ProductController@productListing');
Route::get('testp', 'ProductController@registrationData');

Route::get('userDelete/{id}', 'ProductController@userDelete');
Route::get('editUser/{id}', 'ProductController@editUser');

Route::post('/editUserData', 'ProductController@editUserData');
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('UserController','UserController@index');
Route::post('RegistrationData','UserController@RegistrationData');
Route::post('UserLogin','UserController@UserLogin');
Route::get('gallery','UserController@gallery');
Route::post('ImageData','UserController@ImageData');
Route::get('Logout', 'UserController@Logout');

Route::get('Admin', 'AdminController@index');
Route::post('userLogin', 'AdminController@userLogin');
Route::get('logout', 'AdminController@logout');
Route::get('dashboard', 'AdminController@dashboard');
Route::get('galleryListing', 'AdminController@galleryListing');
Route::get('userListing', 'AdminController@userListing');
Route::get('deleteGallery/{id}', 'AdminController@deleteGallery');
Route::get('deleteUser/{id}', 'AdminController@deleteUser');
Route::post('galleryData', 'AdminController@galleryData');
Route::post('userData', 'AdminController@userData');
Route::get('adminEditUser1/{id}', 'AdminController@adminEditUser1');
Route::post('updateUserData', 'AdminController@updateUserData');

Route::get('adminEditGallery/{id}', 'AdminController@adminEditGallery');
Route::post('updateGalleryData', 'AdminController@updateGalleryData');

// Route::get('paging', 'AdminController@paging');
// Route::get('pdfview', 'AdminController@pdfview');
// Route::get('PDF_create_3dview(pdfdoc, username, optlist)',array('as'=>'pdfview','uses'=>'AdminController@pdfview'));
Route::get('pdfview',array('as'=>'pdfview','uses'=>'AdminController@pdfview'));
Route::get('pdfusers',array('as'=>'pdfusers','uses'=>'AdminController@pdfusers'));
Route::get('gmaps', 'AdminController@gmaps');

// Route::get('adminEditUser1/{id}', array('as'=>'edit_1','uses'=>'AdminController@adminEditUser1'));

Route::get('/func', function () {
    return MyFuncs::full_name("Vikas","Kurmi");
});

Route::get('test', 'AdminController@test');

Route::get('role',['middleware' => 'Role:ad','uses' => 'TestController@index',]);
// Route::get('TestController', 'TestController@index');


Route::get('/ip', ['middleware' => 'ad', function(){
    return "Set IP Address ";
}]);


Route::post('authlogin', 'AdminController@authlogin');
// Route::post('authlogin', 'AdminController@authlogin');

