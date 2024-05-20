<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ShopLink;
use \App\Http\Controllers\AppController;

Route::controller(ShopLink::class)->group(function (){

	Route::post("/save/new_install", "save_new_install");
});

Route::controller(AppController::class)->group(function (){
	Route::post("/save_insta_profile","save_insta_profile");

	Route::get("/check_if_block_exists/{our_passw_token}","check_and_update_block_addition_after_Ididit_button_click");
	
	Route::post("/save_feed_title/{our_passw_token}","save_feed_title"); 

        Route::post('/shopify_webhooks', 'handle_shopify_webhooks');
});

//ank reviewed
