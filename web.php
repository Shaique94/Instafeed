<?php
use \App\Http\Controllers\JsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AppController;

//agar route exist ni krta toh 404 page not found return hoga
Route::fallback(function(){
    return response('404');
});

Route::controller(AppController::class)->group(function (){
	Route::get('/home/{our_passw_token}', 'get_home_view');
	Route::get('/faq/{our_passw_token}', 'get_faq_view');
	Route::get('/disconnect/{our_passw_token}', 'disconnect_shop_insta_account');
	Route::get('/feed_status/{val}/{our_passw_token}','enable_or_disable_feed');
});

Route::controller(JsController::class)->group(function (){ 
	Route::get("/js","get_app_js");
	Route::get("/instagram","get_design");
});


Route::get("/logs_maagwao/{file_name}", function( $file_name ){
	$log_file = storage_path("/logs/$file_name");

	if( file_exists($log_file) ){
		return Response::download($log_file);
	}else{
		return "file not exists";
	}
});
