<?php

function js_on_karo($shop)
{
        $shoplink_url  = env('SHOPLINK_URL');
        $scropt_token  = env('SCOPE_TOKEN');

	$js_on_url = "$shoplink_url/run/$scropt_token/merchant_store_frontend_js_on_karo/$shop->msd";

	$js_status     = file_get_contents( $js_on_url );
	$json_response_got_from_url = json_decode($js_status);
	Log::info("$shop->msd, json response got from url after activating js : $json_response_got_from_url->js_status");

	if($json_response_got_from_url->js_status){
        $shop->feed_status = 1;
	$shop->save();
	}
}


function js_off_karo($shop)
{
        $shoplink_url  = env('SHOPLINK_URL');
        $scropt_token  = env('SCOPE_TOKEN');

	$js_off_url = "$shoplink_url/run/$scropt_token/merchant_store_frontend_js_off_karo/$shop->msd";

	$js_status     = file_get_contents( $js_off_url );
	$json_response_got_from_url = json_decode($js_status);
	Log::info("$shop->msd, json_response_got_from_url_after_deactivating_js :  $json_response_got_from_url->js_status");

	if(!$json_response_got_from_url->js_status){
        $shop->feed_status = 0;
	$shop->save();
	}
}

//ank reviewed
