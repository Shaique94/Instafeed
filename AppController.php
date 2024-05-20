<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Log;
use Storage;
use File;

class AppController extends Controller
{
	public function get_home_view( $our_passw_token )
	{
		$shop = \App\Models\Shop::where("our_passw_token", $our_passw_token)->first();
		return view("home",compact("shop"));
	}

	public function save_insta_profile(Request $req)
	{      
		$shop = \App\Models\Shop::where("our_passw_token", $req->our_passw_token)->first();		
		Log::info("$shop->msd, Insta username entered : $req->user_name ");
		
		$app_url = env("SHOPLINK_URL");


		//if there are images still there in db even after disconnecting then below condition will delete it(this 		   might occur when user disconect instantly meanwhile the jobs gets executed in the background) 
		$leftout_images_in_db_and_internal_storage = \App\Models\InstaPost::where("shop_id", $shop->id)->get();
		if(count($leftout_images_in_db_and_internal_storage) != 0){

			//delete_insta_images_from_internal_storage($shop);
			$images_deleted = \App\Models\InstaPost::where("shop_id", $shop->id)->delete();
			Log::info("$shop->msd, Number of previous leftout images deleted : $images_deleted");
		}


                $insta_profile = get_insta_profile_data( $req->user_name);


		if( ! $insta_profile ){
                     Log::info("$shop->msd,  Invaild username entered i.e ($req->user_name) and redirected to home page");
                     return redirect("$app_url/open_page/home/$req->our_passw_token?msg=No user found");
                }


		if( $insta_profile->is_private ){
		     Log::info("$shop->msd, Entered username is private i.e ($req->user_name) and redirected to home page");
                     return redirect("$app_url/open_page/home/$req->our_passw_token?msg=Public accounts only");
		}

		check_and_update_block_status($shop);

		save_insta_profile_data_of_shop($shop, $insta_profile);

		$job_dispatch_for_image_downloading = \App\Jobs\GetInstaUserContent::dispatch($shop);	

		js_on_karo($shop);

		return redirect("$app_url/open_page/home/$req->our_passw_token");
	}

	public function disconnect_shop_insta_account($our_passw_token)
	{
	
		$shop = \App\Models\Shop::where("our_passw_token", $our_passw_token)->first();
		$shop->insta_username = "0";
		$shop->save();

		js_off_karo($shop);
		Log::info("$shop->msd, Disconnect krne pr front end ko off kiya ");

		//removing images from inside  of direction as well
		//internal storage se delete krne pe permission ka error aarh h , isliye hm sirf db se delete kr rhe h
                //delete_insta_images_from_internal_storage($shop);


		//disconnect pe uski instapost bhi delete kardi db se
		$delete_images = \App\Models\InstaPost::where("shop_id", $shop->id)->delete();
		//delete krne pe deleted images ka count aata h isme
		Log::info("$shop->msd, total images deleted from db: $delete_images");
		
		$app_url = env("SHOPLINK_URL");
		return redirect("$app_url/open_page/home/$our_passw_token?msg=Disconnected");
	}

	public function save_feed_title(Request $req, $our_passw_token )
	{
		$shop = \App\Models\Shop::where("our_passw_token", $our_passw_token)->first();

		if( $req->feed_title ){
			$shop->feed_title = $req->feed_title;
			Log::info("$shop->msd, Feed title saved in db: $req->feed_title");
		}
		else{
			$shop->feed_title = "0";
		}
		$shop->save();
		$shoplink_url = env("SHOPLINK_URL");
		return redirect("$shoplink_url/open_page/home/$our_passw_token?msg=Feed title saved");
	} 

	public function enable_or_disable_feed( $val, $our_passw_token )
	{
		$shop = \App\Models\Shop::where("our_passw_token", $our_passw_token)->first();

		// $val me 0 or 1 ata h , disable or enable k click hone pe	
		if( $val ){
			js_on_karo($shop);
			Log::info("$shop->msd, Feed status : Feed enabled  and Js on hogya  ");		
		}else{
			 js_off_karo($shop);
			Log::info("$shop->msd, Feed status : Feed disabled and Js off hogya ");
		}
		
		$shoplink_url  = env('SHOPLINK_URL');
                return redirect("$shoplink_url/open_page/home/$our_passw_token?msg=Feed Status Updated");
	}

	public function check_and_update_block_addition_after_Ididit_button_click($our_passw_token)
	{	
		$shop = \App\Models\Shop::where("our_passw_token", $our_passw_token)->first();
		
		$block_added = check_if_block_exists($shop);
		$shoplink_url       = env('SHOPLINK_URL');
		
		if($block_added)
		{
			$shop->block_added = 1;
			$shop->save();
			Log::info("$shop->msd, Block found , after clicking 'I did it' button and moved to last page");
			return ["block_added"=>1];
		}
		else{
			$shop->block_added = 0;
			$shop->save();
			Log::info("$shop->msd, Block not found, after clicking 'I did it' button and  warning message displayed on the same page");
			return ["block_added"=>0];

		}
	}

	public function handle_shopify_webhooks( Request $req )
	{
		$msd  = $req->header('msd');
		$shop = \App\Models\Shop::where("msd", $msd)->first();

		$webhook_event = $req->header('webhook-event');
		$webhook_data  = $req->all();

		Log::info("$shop->msd [shopify webhooks][event: $webhook_event][data we got: ".json_encode($webhook_data));

		$shopify_webhook = handle_shopify_webhook_action( $shop, $webhook_event, $webhook_data);

		return;
	}
}

//ank reviewed

