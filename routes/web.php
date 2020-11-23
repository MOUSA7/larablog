<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

View::share('blogs',App\Blog::all());
View::share('category',App\Category::latest()->get());
View::share('user',App\User::all());

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

//Route::get('mail',function (){
//    $data = ['title'=>'This is Mail Title','content'=>'This is Mail Content '];
//    Mail::send('emails.test',$data,function ($message){
//        $message->to('eng.mousa.sh@gmail.com','Mousa')->subject('hello and Welcome To my website');
//    });
//});

Route::get('/login/{provider}','Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback','Auth\LoginController@handleProviderCallback');


Auth::routes();

Route::get('home','HomeController@index')->name('home');

Route::resource('/admin/users','UsersController',['names'=> [
    'index'=>'admin.users.index',
    'create'=>'admin.users.create',
    'show'=>'admin.users.show',
    'edit'=>'admin.users.edit'
]]);
Route::match(['DELETE','GET'],'/admin/users/{id}/delete','UsersController@destroy');

Route::group(['prefix'=>''], function () {
    Route::get('/', 'FrontendController@index')->name('frontend.pages.index');
    Route::get('larablog/blog', 'FrontendController@blog');
    Route::get('larablog/post', 'FrontendController@post');
    Route::get('larablog/show/{slug}', 'FrontendController@show')->name('larablog.show');
    Route::get('larablog/contact', 'ContactController@contact');
    Route::post('larablog/contact', 'ContactController@send');

});

Route::group(['prefix'=>''], function () {
    Route::get('admin', 'AdminController@index')->name('admin.index');
});

Route::resource('admin/blogs','BlogsController',['names'=>[

    'index'=>'admin.blogs.index',
    'create'=>'admin.blogs.create',
    'show'=>'admin.blogs.show',
    'edit'=>'admin.blogs.edit',

]]);
Route::match(['DELETE','GET'],'/admin/blogs/{id}/delete','BlogsController@destroy');
Route::get('blogs/trash','BlogsController@trash')->name('admin.blogs.trash');
Route::get('/blogs/trash/{id}/restore','BlogsController@restore');
Route::get('/blogs/control','BlogsController@control')->name('admin.blogs.controlblog');


Route::get('categories','CategoriesController@index')->name('admin.categories.index');
Route::get('categories/create','CategoriesController@store')->name('admin.categories.store');
Route::post('categories/create','CategoriesController@store')->name('admin.categories.store');

Route::get('categories/{id}/edit','CategoriesController@edit')->name('admin.categories.edit');
Route::PUT('categories/{id}','CategoriesController@update')->name('admin.categories.edit');

Route::get('categories/delete/{id}', 'CategoriesController@destroy');
Route::POST('categories/delete/{id}', 'CategoriesController@destroy');

Route::get('/categories/{slug}','CategoriesController@show')->name('admin.categories.show');

Route::get('/admin/test', 'HomeController@test');

Route::get('/larablog/blogs/search', 'BlogsController@SearchBlogs');

Route::get('/logout', 'HomeController@logout');

