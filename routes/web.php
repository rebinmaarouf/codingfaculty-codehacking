<?php
use App\User;
use App\Role;
use App\Photo;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/test', function(){
	echo "users:";echo "<br/>";
	$users  = User::all();
	foreach($users as $user){
		echo $user->name."<br/>";
	}
	
	echo "<br/>";
	echo "user role:";echo "<br/>";
	$userrole = User::all();
	foreach($userrole as $user){
		echo $user->name.": ";
		echo $user->Role->name. " ";
		if($user->photo){
		echo "photo:". $user->photo->filee. "<br/>";
		}
	}
	
	echo "<br/>";
	echo "role:";echo "<br/>";
	$roles = Role::all();
	foreach($roles as $role){
		echo $role->name ."<br/>";
	}
	
		
	echo "<br/>";
	echo "role user:";echo "<br/>";
	$roleuser = Role::all();
	foreach($roles as $role){
		echo $role->name .": <br/>";
		echo "<ul>";
		foreach($role->user as $user){
			echo "<li>";
		echo $user->name ."</li>";
		
		}
	echo "</ul>";
	echo "<br/>";
	
	}
});

Route::group(['middleware'=>'admin'], function(){
	
	Route::get('/admin',function(){
		return view('admin.index');
	});
	
	Route::resource('/admin/users','admin\AdminUsersController');
	
	Route::resource('/admin/posts','admin\AdminPostsController');
});


