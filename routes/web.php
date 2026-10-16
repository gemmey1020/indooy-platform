<?php
use \Illuminate\Http\Request ;
$lang = request()->segment(1);
$lang=strtolower($lang);
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
  Route::get('/home', function() {
  return redirect('/en/WebSite_Creation');

  });
  Route::get('/WebSite_Creation', function() {
  return redirect('/en/WebSite_Creation');

  });
  Route::get('/landing_page/company/inquiry','LandingPageController@inquiry');
  if(in_array($lang,['ar','en']))
  {
  Route::group(['middleware'=>'Lang','prefix'=>'{lang}'],function(){

  Route::get('/', function($lang='ar') {
  return view('site.home');
  });
  Route::get('/search/', 'SearchController@search' );

  Route::get('/profile/{categoryname}/{code}/{company_name}','LandingPageController@get_landing_page');

#navbar routes
 Route::get('/maps/','SiteController@get_maps');

  });
  }else{
  Route::get('/ar', function() {
  return view('site.home');
  });
  }
  Route::get('/', function() {
  return redirect('/ar');
  });
  Route::get('/index.php', function() {
  return redirect('/');
  });



Route::get('search/autocomplete', 'SearchController@AutoComplete_AJAX');

Route::group(['middleware' => 'web_WebSite_Creation_guest','prefix' => 'WebSite_Creation'], function() {

Route::get('/register',
'WebSite_Creation_Auth\RegisterController@showRegistrationForm');

Route::post('/register',
'WebSite_Creation_Auth\RegisterController@register');

Route::get('/login', 'WebSite_Creation_Auth\LoginController@showLoginForm');
Route::post('/login', 'WebSite_Creation_Auth\LoginController@login');


//Password reset routes
Route::get('/recover/reset', 'WebSite_Creation_Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/recover/email', 'WebSite_Creation_Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/recover/reset/{token}', 'WebSite_Creation_Auth\ResetPasswordController@showResetForm');
Route::post('/recover/reset', 'WebSite_Creation_Auth\ResetPasswordController@reset');
});

Route::group(['middleware' => 'web_WebSite_Creation_auth' ,'prefix' => '{lang}/WebSite_Creation'], function($lang='en') {

Route::get('/create_landing','LandingPageController@get_add_landing_page');
Route::post('/create_landing','LandingPageController@add_landing_page');
//Route::post('/WebSite_Creation','LocationController@test');

Route::get('/yourTask/{type}/{id}','LandingPageController@landing_page_timer');

Route::get('/all_landing','LandingPageController@get_all_landing_page');

Route::get('/edit_landing/{id}','LandingPageController@get_edit_landing_page');
Route::post('/edit_landing/{id}','LandingPageController@edit_landing_page');





Route::get('/', function(){
return view('Web-site-Creation.home');
});

});
Route::get('/WebSite_Creation/LOCKED/', 'WebSite_Creation_Auth\LoginController@LOCKED');
Route::get('/WebSite_Creation/logout-locked/{id}', 'WebSite_Creation_Auth\LoginController@logout');

Route::post('/WebSite_Creation/LOCKED/', 'WebSite_Creation_Auth\LoginController@LOCKED');
Route::get('/Web-site-Creation/lockedScrean', function(){
return view('Web-site-Creation.locked');
});


Route::get('en/Admin', function () {
return redirect('en/Admin_Dashboard');
});
// Route::get('SalesManager', function () {
//     return redirect('SalesManager_Dashboard');
// });
// Route::get('Sales', function () {
//     return redirect('Sales_Dashboard');
// });
// Route::get('petrocare', 'PetrocareController@showOnSite');
// Route::get('petrocare/{id}/details', 'PetrocareController@showOnSite_details');



// Auth::routes();

Route::group(['middleware' => 'Admin_guest'], function() {
// Route::get('/Admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
// Route::post('Admin_register', 'AdminAuth\RegisterController@register');



Route::get('en/Admin_login', 'AdminAuth\LoginController@showLoginForm');
Route::post('en/Admin_login', 'AdminAuth\LoginController@login');




// Route::get('Admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
// Route::post('Admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('Admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
// Route::post('Admin_password/reset', 'AdminAuth\ResetPasswordController@reset');

});
Route::get('en/Admin_Dashboard', function(){
return view('Admin.Dashboard');
});
Route::group(['middleware' => 'Admin_auth','prefix' => 'Admin_Dashboard'], function(){



Route::get('Add_activity','ActivityController@get_add_activity') ;
Route::post('Add_activity','ActivityController@add_activity') ;

Route::get('All_activites','ActivityController@all_activites') ;

Route::get('All_activites_Clone','ActivityController@clone_activity') ;

Route::get('edit_activity/{id}','ActivityController@get_edit_activity') ;
Route::post('edit_activity/{id}','ActivityController@edit_activity') ;

Route::get('delete_activity/{id}','ActivityController@delete_activity') ;
#########################################################################################
Route::get('RelatedActivity','ActivityController@get_Rel_activity') ;       ###
##     ##      ##     ##     ##     ##                                              ###
Route::get('/RelatedNameEn/{id}','ActivityController@RelatedNameEn_Ajax');          ###
##     ##      ##     ##     ##     ##                                              ###
// Route::get('/RelatedKeywordsEn/{id}','ActivityController@RelatedKeywordsEn_Ajax');    ###
// ##     ##      ##     ##     ##     ##                                                ###
// Route::get('/RelatedKeywordsAr/{id}','ActivityController@RelatedKeywordsAr_Ajax');    ###
##     ##      ##     ##     ##     ##                                                ###
#########################################################################################

Route::post('RelatedActivity','ActivityController@Rel_activity') ;

Route::get('All_RelatedActivites','ActivityController@all_Rel_activites') ;

Route::get('edit_RelatedActivity/{id}','ActivityController@get_edit_Rel_activity') ;
Route::post('edit_RelatedActivity/{id}','ActivityController@edit_Rel_activity') ;

Route::get('delete_RelatedActivity/{id}','ActivityController@delete_Rel_activity') ;

####################################################################################
####################################################################################

Route::get('all_in_one','ActivityController@get_all_in_one') ;
Route::post('all_in_one','ActivityController@add_all_in_one') ;


####################################################################################
####################################################################################

Route::get('Request/{type}/{LandingID}','RequestsController@get_request') ;
Route::post('Request/{type}/{LandingID}','RequestsController@request') ;

// Route::get('Request/{type}/{WebSiteID}','RequestsController@get_request') ;
// Route::post('Request/{type}/{WebSiteID}','RequestsController@request') ;

####################################################################################
Route::get('All_Requests/{type}','RequestsController@get_requests') ;
####################################################################################
Route::get('edit_all_landing','LandingPageController@get_all_edit_Admin') ;
####################################################################################

Route::get('edit_landing_ADMIN/{LandingID}','LandingPageController@get_edit_Admin') ;
Route::post('edit_landing_ADMIN/{LandingID}','LandingPageController@edit_Admin') ;

############################################################################
############################################################################
Route::get('All_websites','RequestsController@get_all_websites') ;
############################################################################
############################################################################


####################################################################################
####################################################################################

Route::post('all_in_one','RequestsController@add_all_in_one') ;

});
Route::post('Admin_logout', 'AdminAuth\LoginController@logout');



// Route::get('login/{provider}', 'AuthSocController@redirectToProvider');
// Route::get('auth/{provider}/callback', 'AuthSocController@handleProviderCallback');

