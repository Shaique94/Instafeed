@if ( $shop->insta_username == "0" )
<div class="Polaris-Layout__AnnotationWrapper">
                      <div class="Polaris-Layout__Annotation">
                        <div class="Polaris-TextContainer"><br>
                          <h2 class="Polaris-Heading" style="font-size: x-large;font-weight:bold;">Instagram Username</h2>
                          <div class="Polaris-Layout__AnnotationDescription">
                            <p>You can link your Instagram Business account (recommended) or simply enter your Instagram Username and click on connect.</p>
			  </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__AnnotationContent" style="margin-right: 0px; padding-right: 0px;">
                        <div class="Polaris-Card" style="padding: 10px"> 
                          <div class="Polaris-TextContainer">
                          <div style="--top-bar-background:#00848e; --top-bar-color:#f9fafb; --top-bar-background-darker:#006d74; --top-bar-background-lighter:#1d9ba4;">
                          <div id="SetAtt1" class="mobile-no" data-step="0" data-intro="Select Facebook Page Connected to your Instagram Account">
                            <div id="Checkdisplaynon" class="choose-account" style="display: none;">
                              <div class="Polaris-Labelled__LabelWrapper">
                              </div>
                              <div class="Polaris-Select"><select id="SelectInstagramAccount" class="Polaris-Select__Input" aria-invalid="false"><option></option>
                                </select>
                                <div class="Polaris-Select__Content" aria-hidden="true"><span class="Polaris-Select__SelectedOption"></span><span class="Polaris-Select__Icon"><span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable  ="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span></span>
                                </div>
                                <div class="Polaris-Select__Backdrop"></div>
                              </div>
                            </div>
                            </div>
                          </div>
                            <div class="manual_connect">
			      </div>
<!--card for username start -->
                          <div class="Polaris-ShadowBevel" style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-content-xs: &quot;&quot;; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
  <div class="Polaris-Box" style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:60%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-end-xs:var(--p-space-400)">  
<!--form start -->
			   <form action="{{env('APP_URL')}}/api/save_insta_profile" method="POST" onsubmit="startLoading()">
                         <input type="hidden" name="our_passw_token" value="{{$shop->our_passw_token}}">
              <!-- text area-->
                             <div class="Polaris-BlockStack" style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-400)">
                                <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                 <div class="">
                                  <div class="Polaris-Labelled__LabelWrapper">
                                     <div class="Polaris-Label">
                                   <label id=":R2q6:Label" for=":R2q6:" class="Polaris-Label__Text">Enter Username</label>
                                     </div>
                                    </div>
                                 <div class="Polaris-Connected">
                              <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                            <div class="Polaris-TextField">
                          <input id="user_name" name="user_name" class="Polaris-TextField__Input" type="text" value="" placeholder="e.g johndoe" required>
                        <div class="Polaris-TextField__Backdrop">
		     </div>
		<!--inserting warning meesage here-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- text area end-->
                       <button type="submit"  class="btn Polaris-Button Polaris-Button--primary " value="submit" style="margin: 0px 0px 0px 0px;background-color: rgba(26,26,26,1);color: white;">Connect</button>
	    <div id="user_not_found_warning_message"style="display:none;color:red;">
                                * User not found on Instagram, make sure you use the correct Instagram Username.
	  </div>
	  <div id="private_account_warning_message"style="display:none;color:red;">
                                * Please enter public accounts only.
			</div>
                        </div>
	                  </div>
			     </form>
<!-- form end-->
</div>
</div>
<!--card for username end here -->
                          </div>
                        </div>
                      </div>
		    </div>
<!-- cards start-->
@else
<!--gif start -->
@if(!$shop->block_added)
<section class="post-connect" style="display: block;">
              <div style="--top-bar-background:#00848e; --top-bar-background-lighter:#1d9ba4; --top-bar-color:#f9fafb;">
                <div class="Polaris-Layout">
                  <div class="Polaris-Layout__AnnotatedSection">
                    <div class="Polaris-Layout__AnnotationWrapper">
                      <div class="Polaris-Layout__Annotation">
                        <div class="Polaris-TextContainer" style="margin-left:1.25rem"><br>
                          <h2 class="Polaris-Heading" style="font-size: x-large;font-weight:bold;">Add the Instafeed Block</h2>
                          <div class="Polaris-Layout__AnnotationDescription">
                          Click the button below to do it. Don't forget to press the save button after adding block. 
			  </div>
<!--adding button start here-->
<span style="display:flex;">
                        <a href="https://{{$shop->msd}}/admin/themes/current/editor?addAppBlockId={{env('APP_BLOCKID')}}/insta_feed_block" target="_blank">
                            <button id="block_adding_button" class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantSecondary Polaris-Button--sizeMedium Polaris-Button--textAlignCenter" type="button" style="background-color: rgba(26,26,26,1);color: white;">
			  <span class="">Add Instafeed Block</span>
			   </button>
			</a>
</span>
			<!--adding next button here-->
			<button id="next_button" class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantSecondary Polaris-Button--sizeMedium Polaris-Button--textAlignCenter" type="button" style="background-color: white;color: rgba(26,26,26,1);margin-top: 10px;display:block;" onclick="getRequest();startLoading()" >
                          <span class="">I did it!</span>
                           </button>

<span id="warning_message" style="color:red;margin-top: 0.75rem;display:none;">
			* You need to Add the Block before clicking 'I did it'. If you are having issues , <a href="{{env('SHOPLINK_URL')}}/open_page/contact_support/{{$shop->our_passw_token}}" target="_blank">Click Here</a> to contact our support.
                        </span>

		      
<!--adding button end here-->
                        </div>
                      </div>
                      <div class="Polaris-Layout__AnnotationContent">
                                                       <div class="Polaris-Card Settings-Card" style="padding: 20px;">
<!--inserting card -->
<div class="Polaris-ShadowBevel" style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-content-xs: &quot;&quot;; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
  <div class="Polaris-Box" style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:70%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-end-xs:var(--p-space-400)">
<!--inserting gif here start --> 
 <div style="">
         <img src="{{env('APP_URL')}}/insta_fusion_giff.gif" style="width:100%;border-radius: 10px;border-style: solid;"></img>
 </div>

<!--inserting gif end here-->			     
</div>
</div>
<!--card end here-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section><br>
<!--gif end-->
<hr class="Polaris-Divider" style="border-block-start:var(--p-border-width-025) solid var(--p-color-border)"><br>

@endif

<!--Disconnect k liye start -->
<div id="disconnection_region" style=" @if($shop->block_added) display:block @else display:none @endif ">
<div class="Polaris-Layout__AnnotationWrapper" style="margin-bottom:20px;">
                      <div class="Polaris-Layout__Annotation" style="padding-top: 20px;">
			<div class="Polaris-TextContainer" style="margin-left:1.25rem"><br>
                         <h2 class="Polaris-Heading" style="font-size: x-large;font-weight:bold;">Instagram Username</h2>
                          <div class="Polaris-Layout__AnnotationDescription">
                            <p>You can disconnect your Instagram account simply by clicking on <b>"Disconnect"</b> button.</p>
                            </div-->
                          </div>
                        </div>
		      </div>
                      <div class="Polaris-Layout__AnnotationContent" style="margin-right: 0px; padding-right: 0px;">
                        <div class="Polaris-Card" style="padding: 20px">
			  <div class="Polaris-TextContainer">
<!--card disconnection wale k liye start here -->
                          <div class="Polaris-ShadowBevel" style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-content-xs: &quot;&quot;; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
  <div class="Polaris-Box" style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:80%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-end-xs:var(--p-space-400)">
                          <button type="button" class="Polaris-Button" data-polaris-unstyled="" id="instagram-connect" onclick="FBLogin()" style="display: none;">
			  </button>
				<span style="display:flex;">
				<span>Connected Account: <b>{{$shop->insta_username}}</b></span>
				</span>
				<br>
                          <small id="instagram-connect-message" style="display: none;">To choose Facebook Page connected to your Instagram Account.</small>
                          <div>
			    <small><a href="#" style="vertical-align: bottom; padding-left: 5px;display: none;"> </a></small>
<!-- disconnection button start -->
                           <a href="{{env('APP_URL')}}/disconnect/{{$shop->our_passw_token}}">
                            <button type="button" class="Polaris-Button Polaris-Button--destructive1" data-polaris-unstyled="" id="disconnect-page" style="background-color: rgba(26,26,26,1);color: white;"onclick="startLoading()">
                              <span class="Polaris-Button__Content">
                                  <span>Disconnect Instagram Account</span>
                              </span>
			  </button>
<!--disconnection button end -->
                          </a>
                          <i class="download-info" style=""><br><br>It may take few minutes for the feed to be downloaded, contact support if feed does not appear on homepage.</i>
                          </div>
  </div>
</div>
<!--card disconnection end here -->				
                          <div style="--top-bar-background:#00848e; --top-bar-color:#f9fafb; --top-bar-background-darker:#006d74; --top-bar-background-lighter:#1d9ba4;">
                          <div id="SetAtt1" class="mobile-no" data-step="0" data-intro="Select Facebook Page Connected to your Instagram Account">
                            <div id="Checkdisplaynon" class="choose-account" style="display: none;">

                              <div class="Polaris-Select"><select id="SelectInstagramAccount" class="Polaris-Select__Input" aria-invalid="false"><option></option>
                                </select>
                                <div class="Polaris-Select__Content" aria-hidden="true"><span class="Polaris-Select__SelectedOption"></span><span class="Polaris-Select__Icon"><span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span></span>
                                </div>
                                <div class="Polaris-Select__Backdrop"></div>
                              </div>
                            </div>
                            </div>
                          </div>
                            <div class="manual_connect" style="display: none;">
                              <p style="margin-bottom: 10px;"> -- OR -- </p>
                              <div class="Polaris-TextField" style="width: 200px;float: left;margin-right: 10px;">
                                <input type="text" name="" class="Polaris-TextField__Input" id="txt_username" style="" placeholder="Instagram Username/Link">
                                <div class="Polaris-TextField__Backdrop"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
		    </div>
<!--divider start -->
 <hr class="Polaris-Divider" style="border-block-start:var(--p-border-width-025) solid var(--p-color-border)"><br>
<!--divider end-->
<!--two card space start here-->

<!--inserting radio buttons card here start-->
<div class="Polaris-Layout__AnnotationWrapper" style="">
                      <div class="Polaris-Layout__Annotation" style="">
			<div class="Polaris-TextContainer" style="margin-left:1.25rem"><br>
                         <h2 class="Polaris-Heading" style="font-size: x-large;font-weight:bold;margin-top:-0.2rem">Instagram Feed Status</h2>
                          <div class="Polaris-Layout__AnnotationDescription">
                            You can conveniently enable or disable your Instagram Feed within this section.
                          </div>
                        </div>
		      </div>
                      <div class="Polaris-Layout__AnnotationContent" style="margin-right: 0px; padding-right: 0px;">
                        <div class="Polaris-Card" style="padding: 20px">
			  <div class="Polaris-TextContainer">
<!--card disconnection wale k liye start here -->
<!--1st card satrrt-->

<div class="Polaris-ShadowBevel" style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-content-xs: &quot;&quot;; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
  <div class="Polaris-Box" style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:10%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-end-xs:var(--p-space-400);height: 90px;">
                 <div class="Polaris-Card" style="padding: 5px"> 

                         <!--Radio button start-->

<h2><b>Feed Status :</b></h2>
<div class="Polaris-LegacyStack Polaris-LegacyStack--horizontal">
  <div class="Polaris-LegacyStack__Item">
    <div>
      <label onclick="update_feed_status(1)" class="Polaris-Choice Polaris-RadioButton__ChoiceLabel" for="disabled">
        <span class="Polaris-Choice__Control">
          <span class="Polaris-RadioButton">
           <input id="enabled" name="accounts" type="radio" class="Polaris-RadioButton__Input" aria-describedby="disabledHelpText" value=""  @if($shop->feed_status)checked="" @endif>
            <span class="Polaris-RadioButton__Backdrop">
            </span>
          </span>
        </span>
        <span class="Polaris-Choice__Label">
          <span>Enable</span>
        </span>
      </label>
    </div>
  </div>
  <div class="Polaris-LegacyStack__Item">
    <div>
      <label onclick="update_feed_status(0)" class="Polaris-Choice Polaris-RadioButton__ChoiceLabel" for="optional">
        <span class="Polaris-Choice__Control">
          <span class="Polaris-RadioButton">
          <input id="optional" name="accounts" type="radio" class="Polaris-RadioButton__Input" aria-describedby="optionalHelpText" value="" @if(!$shop->feed_status) checked="" @endif>
            <span class="Polaris-RadioButton__Backdrop">
            </span>
          </span>
        </span>
        <span class="Polaris-Choice__Label">
          <span>Disable</span>
        </span>
      </label>
    </div>
  </div>
</div><br>

<!--Radio button end -->
                   </div>
</div>
</div>

<!--card disconnection end here -->
                          <div style="--top-bar-background:#00848e; --top-bar-color:#f9fafb; --top-bar-background-darker:#006d74; --top-bar-background-lighter:#1d9ba4;">
                          <div id="SetAtt1" class="mobile-no" data-step="0" data-intro="Select Facebook Page Connected to your Instagram Account">
                            <div id="Checkdisplaynon" class="choose-account" style="display: none;">

                              <div class="Polaris-Select"><select id="SelectInstagramAccount" class="Polaris-Select__Input" aria-invalid="false"><option></option>
                                </select>
                                <div class="Polaris-Select__Content" aria-hidden="true"><span class="Polaris-Select__SelectedOption"></span><span class="Polaris-Select__Icon"><span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span></span>
                                </div>
                                <div class="Polaris-Select__Backdrop"></div>
                              </div>
                            </div>
                            </div>
                          </div>
                            <div class="manual_connect" style="display: none;">
                              <p style="margin-bottom: 10px;"> -- OR -- </p>
                              <div class="Polaris-TextField" style="width: 200px;float: left;margin-right: 10px;">
                                <input type="text" name="" class="Polaris-TextField__Input" id="txt_username" style="" placeholder="Instagram Username/Link">
                                <div class="Polaris-TextField__Backdrop"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
		    </div>
<!--inserting radio buttons card end here-->
<!--two card space end here-->
<!--inserting divider -->
 <hr class="Polaris-Divider" style="border-block-start:var(--p-border-width-025) solid var(--p-color-border);"><br>
<!--divider end-->
<!--inserting the 2nd card start-->

<div class="Polaris-Layout__AnnotationWrapper" style="margin-bottom:20px;">
                      <div class="Polaris-Layout__Annotation" style="padding-top: 20px;">
			<div class="Polaris-TextContainer" style="margin-left:1.25rem"><br>
                         <h2 class="Polaris-Heading" style="font-size: x-large;font-weight:bold;">Instagram Feed Title</h2>
                          <div class="Polaris-Layout__AnnotationDescription">
                            Showcase the Instagram Feed title on your website
                          </div>
                        </div>
		      </div>
                      <div class="Polaris-Layout__AnnotationContent" style="margin-right: 0px; padding-right: 0px;">
                        <div class="Polaris-Card" style="padding: 20px">
			  <div class="Polaris-TextContainer">
<!--card disconnection wale k liye start here -->
<!--2nd card start-->

<div class="Polaris-ShadowBevel" style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-content-xs: &quot;&quot;; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
  <div class="Polaris-Box" style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:20%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-end-xs:var(--p-space-400)">
                         <div class="row" style="">
                          <div class="col-sm-12">
                             <div class="Polaris-Card" style="padding: 5px;overflow: auto;">

                               <!--feed title start-->
        
                      <form action="{{env('APP_URL')}}/api/save_feed_title/{{$shop->our_passw_token}}" method="POST" style="margin-bottom:0px;">
                                <div class="feed_title">
				  <label class="Polaris-Labelled__LabelWrapper"><b>Instagram Feed Title:<b></label>
                                  <div class="Polaris-TextField" style="float: left;    margin-right: 10px; width: 250px;">
     <input type="text" name="feed_title"  class="Polaris-TextField__Input" id="txt_feed_title" style="" placeholder="e.g. Find us on Instagram" @if( $shop->feed_title != "0" ) value="{{ $shop->feed_title}}"  @endif>
                                    <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                  <button type="submit" class="btn Polaris-Button Polaris-Button--primary" id="save_title" value="SAVE" style="background-color: rgba(26,26,26,1);color: white;" onclick="startLoading()">Save</button>
                                </div>
                                </form>
                                <br>
                                  <i>Feel free to reach out via support for customization.</i>
                               </div>
                          </div>
                        </div>
                        </div>
                      </div>


<!--card disconnection end here -->
                          <div style="--top-bar-background:#00848e; --top-bar-color:#f9fafb; --top-bar-background-darker:#006d74; --top-bar-background-lighter:#1d9ba4;">
                          <div id="SetAtt1" class="mobile-no" data-step="0" data-intro="Select Facebook Page Connected to your Instagram Account">
                            <div id="Checkdisplaynon" class="choose-account" style="display: none;">

                              <div class="Polaris-Select"><select id="SelectInstagramAccount" class="Polaris-Select__Input" aria-invalid="false"><option></option>
                                </select>
                                <div class="Polaris-Select__Content" aria-hidden="true"><span class="Polaris-Select__SelectedOption"></span><span class="Polaris-Select__Icon"><span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M13 8l-3-3-3 3h6zm-.1 4L10 14.9 7.1 12h5.8z" fill-rule="evenodd"></path></svg></span></span>
                                </div>
                                <div class="Polaris-Select__Backdrop"></div>
                              </div>
                            </div>
                            </div>
                          </div>
                            <div class="manual_connect" style="display: none;">
                              <p style="margin-bottom: 10px;"> -- OR -- </p>
                              <div class="Polaris-TextField" style="width: 200px;float: left;margin-right: 10px;">
                                <input type="text" name="" class="Polaris-TextField__Input" id="txt_username" style="" placeholder="Instagram Username/Link">
                                <div class="Polaris-TextField__Backdrop"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
		    </div>


</div>
<!--inserting the 2nd card end-->


@endif
<script>
stopLoading();

var isClicked = false;

function update_feed_status( param )
{
	if( !isClicked ){
		isClicked = true;
		window.location.href = `{{env('APP_URL')}}/feed_status/${param}/{{$shop->our_passw_token}}`;
	}
}

function update_feed_title(){
        startLoading();
}

function getRequest()
{
        var url =  "{{env('APP_URL')}}/api/check_if_block_exists/{{$shop->our_passw_token}}";
        // Building the request, which you can then pass around
        const request = new Request(url, {
                method: "GET",
                headers: new Headers({
                        "ngrok-skip-browser-warning": "69420",
                }),
        });

        fetch(request)
                .then(response => response.json())
                .then(data => {
			if(!data.block_added){
				document.getElementById("warning_message").style.display = "block";
				stopLoading();
			}
			else{
				window.location.href = `{{env('$SHOPLINK_URL')}}/open_page/home/{{$shop->our_passw_token}}?msg=Block added`;
			}
                });
}

let searchParams = new URLSearchParams(window.location.search);
if ( searchParams.has('msg') ){
        let param = searchParams.get('msg');
	popupToast(param);
	if(param == "No user found"){
		document.getElementById("user_not_found_warning_message").style.display = "block";
	}
	if(param == "Public accounts only"){
		document.getElementById("private_account_warning_message").style.display = "block";
	}
	if(param == "Block added" || param == "Disconnected"){
		stopLoading();
	}
}

if( {{$shop->block_added}} && "{{$shop->insta_username}}" != "0" ){
	setTitleBarWithButton("Insta Feed Fusion","Check preview");
}

if("{{$shop->insta_username}}" == "0" ){
	setTitleBar("Insta Feed Fusion");
}

if("{{$shop->insta_username}}" != "0" && {{$shop->block_added}} == 0){
        setTitleBar("Insta Feed Fusion");
}



function handleTitleBarButtonClick(){
	const redirect = actions.Redirect.create(app);

	redirect.dispatch(actions.Redirect.Action.REMOTE, {
		url: "https://{{$shop->msd}}",
		newContext: true,
	});	
}


</script>
