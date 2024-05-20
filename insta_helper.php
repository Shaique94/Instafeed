<?php

function get_insta_profile_data( $user_name )
{
	
	$api_url = env('SHOPLINK_URL')."/run/".env('SCOPE_TOKEN')."/get_insta_user_info/$user_name";
        
	$insta_profile_data = file_get_contents( $api_url );

	$insta_profile_data_after_json_decode = json_decode($insta_profile_data);

	if($insta_profile_data_after_json_decode->status == "success"){
		return json_decode($insta_profile_data);
	}
	else{
		return false;
	}
}

function download_and_update_insta_post_data( $shop, $post_data )
{
	$thumbnail_name = download_thumbnail_url($post_data->thumbnail_url,$shop);
	Log:info("$shop->msd, Dowloaded image name : $thumbnail_name");

        $post           = new \App\Models\InstaPost();
        $post->msd      = $shop->msd;
        $post->shop_id  = $shop->id;
        $post->feed_id     = $post_data->feed_id;
        $post->uploaded_at = $post_data->uploaded_at;
        $post->media_type  = $post_data->media_type;          
        $post->post_file_names_list = "0";                      
        $post->thumbnail_file_name  = $thumbnail_name;  
        $post->caption  = $post_data->caption_text;
        $post->save();
        return $post;
}
function download_thumbnail_url($thumbnail_url,$shop)
{
        $contents = file_get_contents( $thumbnail_url );
        $media_extension = pathinfo(parse_url($thumbnail_url, PHP_URL_PATH), PATHINFO_EXTENSION);
        $file_name_thumbnail = Str::random(60).".$media_extension";
        Storage::disk('public')->put($shop->msd.'/'.$file_name_thumbnail,$contents);

        return $file_name_thumbnail;
}

function get_content_from_insta_userid($shop)
{
        $scope_token = env('SCOPE_TOKEN');
        $posts_url   = env('SHOPLINK_URL')."/run/$scope_token/get_insta_user_media/$shop->insta_user_id";
        $posts       = file_get_contents($posts_url);
        Log::info($shop->msd."[insta post data json] => $posts");
        return json_decode($posts);
}


function save_insta_profile_data_of_shop( $shop,$insta_profile )
{
        $shop->insta_username  = $insta_profile->username;
        $shop->insta_fullname  = $insta_profile->full_name;
        $shop->insta_user_id   = $insta_profile->insta_user_id;
        $shop->profile_pic_url = $insta_profile->profile_pic_url;
        $shop->biography       = $insta_profile->biography;
        $shop->is_private      = $insta_profile->is_private;
        $shop->feed_status     = true;
        $shop->save();

        return $shop;
}

//ank reviewed
