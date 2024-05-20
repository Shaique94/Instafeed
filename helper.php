<?php


function download_and_get_posts_name( $media_urls,$shop )
{
	$posts_name = [];
	foreach( $media_urls as $url )
	{
		$file_name = download_insta_post( $url,$shop );
		array_push( $posts_name, $file_name );
	}
	return $posts_name;
}

function download_insta_post( $post_url,$shop)
{	

	$contents = file_get_contents( $post_url );
	$media_extension = pathinfo(parse_url($post_url, PHP_URL_PATH), PATHINFO_EXTENSION);
	$file_name_posts = Str::random(60).".$media_extension";
	Storage::disk('public')->put($shop->msd.'/'.$file_name_posts,$contents);
	return $file_name_posts;
}

function delete_insta_images_from_internal_storage( $shop )
{
	$path = storage_path("app/public/$shop->msd");

	if ( file_exists($path) ) 
	{
		$insta_posts = \App\Models\InstaPost::where("shop_id", $shop->id)->get();

		foreach($insta_posts as $insta_post)
		{
			if( file_exists("$path/$insta_post->thumbnail_file_name") ){
				Log::info("$shop->msd , deleted image name from internal storage : $insta_post->thumbnail_file_name");
				unlink("$path/$insta_post->thumbnail_file_name");
			}
		}
	}
}

function get_active_theme_id_of_shop($shop){
	$scope_token = env('SCOPE_TOKEN');
	 $app_url = env("SHOPLINK_URL");
	$fetch_theme_id_url = env('SHOPLINK_URL')."/run/$scope_token/get_active_theme_of_shop/$shop->msd";
	$fetch = file_get_contents($fetch_theme_id_url);
	$after_decoding = json_decode($fetch);
	Log::info("$shop->msd, json data of theme : $fetch");

	if (isset($after_decoding->status) && $after_decoding->status == "failed") {
		Log::info("$shop->msd, No active theme found");
		return redirect("$app_url/open_page/home/$shop->our_passw_token?msg=No active theme found");
	//	return false;
	}
	else{
		$theme_id = $after_decoding->id;
	        return $theme_id;
	}
}
function check_if_block_exists($shop){
	$scope_token = env('SCOPE_TOKEN');
	$id_of_theme = get_active_theme_id_of_shop($shop);
	if($id_of_theme){
		$block_exist_or_not_url = env('SHOPLINK_URL')."/run/$scope_token/is_block_exists_in_theme/$shop->msd~~$id_of_theme";
		$returns_zero_or_one = file_get_contents($block_exist_or_not_url);
		$after_decoding = json_decode($returns_zero_or_one);
		Log::info("$shop->msd, response after checking whether block added or not : $after_decoding");
		return $returns_zero_or_one ;
	}
	else{
		return 0;
	}

}
function check_and_update_block_status($shop){
	if(check_if_block_exists($shop)){ 
		Log::info("$shop->msd, Block addition status : Block found in the theme ");
		$shop->block_added = "1";
		$shop->save();
	}
	else{
		Log::info("$shop->msd, Block addition status:  Block not found in the theme ");
		$shop->block_added = "0";
		$shop->save();
	}

}


function handle_shopify_webhook_action( $shop, $webhook_event, $webhook_data )
{
	if( $webhook_event == 'app/uninstalled' )
	{
		$shop->state = "app_uninstalled";
		$shop->save();
	}
	if($webhook_event == 'themes/publish')
	{
		//ank -- is kaam ke liye job bnao HandleThemePublishWebhook 
		\App\Jobs\HandleThemePublishWebhook::dispatch($shop);
	}

	return;
}

//ank reviewed

