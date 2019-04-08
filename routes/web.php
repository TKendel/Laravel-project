<?php

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




Auth::routes();

Route::get("/",[
	"uses"=>"FrontEndController@index",
	"as"=>"index"
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/post/{slug}",[		//radi ko i sa idom. pogle u controleru kak provjerava ciji je
	"uses"=>"FrontEndController@single",
	"as"=>"single"
]);

Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
	{
		Route::get('/content',[
			'uses'=>'ContentController@index',
			'as'=>'Content.index'
		]);

		Route::get('/content/create',[
			'uses'=>'ContentController@create',
			'as'=>'Content.create'
		]);

		Route::post('/content/store',[
			'uses'=>'ContentController@store',
			'as'=>'Content.store'
		]);

		Route::get('/content/edit/{id}',[
			'uses'=>'ContentController@edit',
			'as'=>'Content.edit'
		]);

		Route::post('/content/update/{id}',[
			'uses'=>'ContentController@update',
			'as'=>'Content.update'
		]);

		Route::get('/content/destroy/{id}',[
			'uses'=>'ContentController@destroy',
			'as'=>'Content.destroy'
		]);

		Route::post('/categroy/store/',[
			'uses'=>'CategoryController@store',
			'as'=>'Category.store'
		]);

		Route::get('/categroy/create',[
			'uses'=>'CategoryController@create',
			'as'=>'Category.create'
		]);

		Route::get('/content/deleted',[
			'uses'=>'ContentController@deleted',
			'as'=>'Content.deleted'
		]);

		Route::get('/content/kill/{id}',[
			'uses'=>'ContentController@kill',
			'as'=>'Content.kill'
		]);

		Route::get('/content/restore/{id}',[
			'uses'=>'ContentController@restore',
			'as'=>'Content.restore'
		]);

		Route::get('/category/index',[
			'uses'=>'CategoryController@index',
			'as'=>'Category.index'
		]);

		Route::get('/category/edit/{id}',[
			'uses'=>'CategoryController@edit',
			'as'=>'Category.edit'
		]);

		Route::post('/category/update/{id}',[
			'uses'=>'CategoryController@update',
			'as'=>'Category.update'
		]);

		Route::get('/category/destroy/{id}',[
			'uses'=>'CategoryController@destroy',
			'as'=>'Category.destroy'
		]);

		Route::get('/tags',[
			'uses'=>'TagController@index',
			'as'=>'tag.index'
		]);

		Route::get('/tag/create',[
			'uses'=>'TagController@create',
			'as'=>'tag.create'
		]);

		Route::post('/tag/store',[
			'uses'=>'TagController@store',
			'as'=>'tag.store'
		]);

		Route::get('/tag/edit/{id}',[
			'uses'=>'TagController@edit',
			'as'=>'tag.edit'
		]);

		Route::post('/tag/update/{id}',[
			'uses'=>'TagController@update',
			'as'=>'tag.update'
		]);

		Route::get('/tag/delete/{id}',[
			'uses'=>'TagController@destroy',
			'as'=>'tag.destroy'
		]);

		Route::get('/users',[
			'uses'=>'UserController@index',
			'as'=>'User.index'
		])->middleware("admin");

		Route::get('/user/destroy/{id}',[
			'uses'=>'UserController@destroy',
			'as'=>'User.destroy'
		]);

		Route::get('/user/admin/{id}',[
			'uses'=>'UserController@admin',
			'as'=>'User.admin'
		]);

		Route::get('/user/removeAdmin/{id}',[
			'uses'=>'UserController@remove',
			'as'=>'User.removeAdmin'
		]);

		Route::get('/user/create/',[
			'uses'=>'UserController@create',
			'as'=>'User.create'
		])->middleware("admin");

		Route::post('/user/store/',[
			'uses'=>'UserController@store',
			'as'=>'User.store'
		]);

		Route::get('/profile/',[
			'uses'=>'ProfileController@index',
			'as'=>'Profile.index'
		]);

		Route::post('/profile/update',[
			'uses'=>'ProfileController@update',
			'as'=>'Profile.update'
		]);

		Route::get('/settings/index',[
			'uses'=>'SettingsController@index',
			'as'=>'Settings.index'
		]);

		Route::post('/settings/update',[
			'uses'=>'SettingsController@update',
			'as'=>'Settings.update'
		]);


	});
