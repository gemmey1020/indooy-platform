<?php
use \Illuminate\Http\Request ;
$lang = request()->segment(1);
$lang=strtolower($lang);
/*
|--------------------------------------------------------------------------
| website  route
|--------------------------------------------------------------------------
|
| Here you may register all of website routes which could be external or inside indooy website.
|
*/

 Route::group(['middleware'=>'Lang','prefix'=>'{lang}'],function(){



	Route::get('/website/{categoryname}/{code}/{company_name}','Full_website_creation@get_Full_website');
					###########################
					###########################
	Route::get('/website/{categoryname}/{code}/{company_name}/{type}','Full_website_creation@get_Full_website');
					###########################
					###########################
});
Route::group(['middleware' => 'web_WebSite_Creation_auth' ,'prefix' =>'en/full_WebSite_Creation'], function() {

Route::get('/create_website','Full_website_creation@get_add_full_website');
Route::post('/create_website','Full_website_creation@add_full_website');
//Route::post('/WebSite_Creation','LocationController@test');

Route::get('/yourTask','Full_website_creation@landing_page_timer');


Route::get('/all_websites','Full_website_creation@get_all_edit_full_website');
Route::get('/delete_website/{id}','Full_website_creation@delete_full_website');
Route::get('/edit_website/{id}','Full_website_creation@get_edit_full_website');
Route::post('/edit_website','Full_website_creation@edit_full_website');

Route::get(
	'/edit_website/delete_photo/{id}','Full_website_creation@delete_client_photo'
);
					###########################
					###########################
Route::get('/all_website_branches/{id}','Full_website_creation@get_all_full_website_branch');
Route::get(
	'/edit_website_branches/{BranchID}','Full_website_creation@get_edit_full_website_branch'
);
Route::post('/edit_website_branches','Full_website_creation@edit_full_website_branch');
					###########################
					###########################
Route::get('/delete_website_branches/{BranchID}','Full_website_creation@delete_full_website_branch');
					###########################
					###########################

Route::get('/all_website_products/{id}','Full_website_creation@get_all_full_website_products');
Route::get(
	'/edit_website_products/{BranchID}','Full_website_creation@get_edit_full_website_products'
);
Route::post('/edit_website_products','Full_website_creation@edit_full_website_products');

Route::get('/delete_website_products/{productID}','Full_website_creation@delete_full_website_product');

});
// #######################################################################
// Route::post('/website/cities','LocationController@get_cities');################
// Route::post('/website/districts','LocationController@get_districts');##########
// #######################################################################