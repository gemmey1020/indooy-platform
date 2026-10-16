<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPage;
use App\WebSiteCreation;
use App\LandingPage_branches;
use App\Activity;
use App\Inquiry;
use App\FullWebSite;
use App\FullWebSiteBranch;
use App\FullWebSiteClients;
use App\FullWebSiteProducts;
use App\FullWebSiteSlider;
use App\MapLocation;
use Session;
use Image;
use Validator;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use Mail;
use Config;

class Full_website_creation extends Controller
{
    public function get_add_full_website()
    {

     $country_list = DB::table('countries')->pluck('name','id');
     $categories=Activity::select('name_en','id')->get();
     // dd($country_list);
      return view('Web-site-Creation.WebSite.FULL_WEBSITE.new-website')->with('country_list',$country_list)->with('categories',$categories);
    }
    public function add_full_website(Request $request)
    {
      //dd($request->all());

     $messages = [
        'company_name_en.required'      => 'please write your company name in english',

        'company_name_ar.required'      => 'please write your company name in arabic',

        'business_email.required'       => 'please write your business email',

        'business_number.required'      =>'please write your specify',

        'keyword_list_en.required'      => "write some keywords in english",
        'keyword_list_ar.required'      => "write some keywords in arabic",
        'country_list.required'         => "your country is  is a must",
        'cities_list.required'          => "your city is is a must",
        'district_list.required'        => "your district is is a must",

        'company_full_address_en.required'        => "please write your Main address in english",
        'company_full_address_ar.required'        => "please write your Main address in arabic",

        'words_en.required'             => "write some words in english to inform user who are you ",
        'words_ar.required'             => "write some words in arabic to inform user who are you ",
        'vision_en.required'            => "write some words in english to inform user who are you ",
        'vision_ar.required'            => "write some words in arabic to inform user who are you ",
        'mission_en.required'           => "write some words in english to inform user who are you ",
        'mission_ar.required'           => "write some words in arabic to inform user who are you ",

        'category_list.required'        => "write some words in arabic to inform user who are you ",

        'product_name_en.required'      => "write some words in english to inform user who are you ",
        'product_name_ar.required'      => "write some words in english to inform user who are you ",
        'product_desc_en.required'      => "write some words in arabic to inform user who are you ",
        'product_desc_ar.required'      => "write some words in english to inform user who are you ",
        'product_photo.required'        => "write some words in english to inform user who are you ",

        'SocFacebook.required'          => "write some words in arabic to inform user who are you ",
        'SocGoogle.required'            => "write some words in english to inform user who are you ",
        'SocYoutube.required'           => "write some words in arabic to inform user who are you ",
        'website_extra.required'        => "write some words in arabic to inform user who are you ",


        'keyword_list_en.required'      => "write some words in english to inform user who are you ",
        'keyword_list_ar.required'      => "write some words in arabic to inform user who are you ",

        'clone_branch_address_title_en.required'          => "write some words in english to inform user who are you ",
        'clone_branch_title_ar.required'                  => "write some words in english to inform user who are you ",
        'clone_branch_address_en.required'                => "write some words in arabic to inform user who are you ",
        'clone_branch_address_ar.required'                => "write some words in english to inform user who are you ",
        'clone_branch_telephone.required'                 => "write some words in english to inform user who are you ",


        'company_logo.required'         => 'upload a Valid photo',
        'company_logo.required'         => 'upload a Valid photo',
        'company_logo.image'            => 'upload a Valid photo',

        ];
         $validatedData = Validator::make($request->all(),[
        // 'company_name_en'    => 'required|unique:landing_pages|max:255',
        // 'company_name_ar'    => 'required|unique:landing_pages|max:255',
        'company_name_en'             => 'required|max:255',
        'company_name_ar'             => 'required|max:255',
        'business_email'              => 'required',

        'business_number'             => 'required',

        'country_list'                =>  'required',
        'cities_list'                 => 'required',
        'district_list'               => 'required',




        'company_full_address_en'     => 'required',
        'company_full_address_ar'     => 'required',

        'words_en'                    =>  'required',

         'words_ar'                   => 'required',

        'vision_en'                   => 'required',
        'vision_ar'                   => 'required',

        'mission_en'                  =>  'required',
        'mission_ar'                  => 'required',

        'category_list'               => 'required',


        'company_logo'                => 'required',


],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
        $customerID_auth=Auth::guard('web_WebSite_Creation')->user()->id;
        $keywords_en=implode(',', $request->input('keyword_list_en'));
        $keywords_ar=implode(',', $request->input('keyword_list_ar'));
                $NewWebSite = new FullWebSite;

        $NewWebSite->customer_id     =$customerID_auth;

$NewWebSite->company_name_en         =$request->input('company_name_en');
$NewWebSite->company_name_ar         =$request->input('company_name_ar');
$NewWebSite->business_email          =$request->input('business_email');
$NewWebSite->business_phone         =$request->input('business_number');

$NewWebSite->category_list           =$request->input('category_list');
$NewWebSite->client_type             =$request->input('client_type');

$NewWebSite->country_list            =$request->input('country_list');
$NewWebSite->cities_list             =$request->input('cities_list');
$NewWebSite->district_list           =$request->input('district_list');

$NewWebSite->keyword_list_en         =$keywords_en;
$NewWebSite->keyword_list_ar         =$keywords_ar;


$NewWebSite->company_full_address_en =$request->input('company_full_address_en');
$NewWebSite->company_full_address_ar =$request->input('company_full_address_ar');

$NewWebSite->desc_en                =$request->input('words_en');
$NewWebSite->desc_ar                =$request->input('words_ar');
$NewWebSite->vision_en               =$request->input('vision_en');
$NewWebSite->vision_ar               =$request->input('vision_ar');
$NewWebSite->mission_en              =$request->input('mission_en');
$NewWebSite->mission_ar              =$request->input('mission_ar');

        //$NewWebSite->company_logo            =$request->input('company_logo');


$NewWebSite->facebookAcc              =$request->input('SocFacebook');
$NewWebSite->googleAcc                =$request->input('SocGoogle');
$NewWebSite->youtubeAcc               =$request->input('SocYoutube');
$NewWebSite->website_extra            =$request->input('website_extra');

$iframe_videos_full                   =$request->input('iframe_videos');
$iframe_link = app('App\Http\Controllers\Full_website_creation')
      ->get_string_between($iframe_videos_full, " src=", " frameborder=");

$NewWebSite->iframe_videos=$iframe_link;
                    // $branches_en = $request->input('address_en');
                    // $branches_ar = $request->input('address_ar');
                    // $branch_title_en=$request->input('cloneaddresstitle_en');
                    // $branch_title_ar=$request->input('cloneaddresstitle_ar');
                    // $branch_phone=$request->input('address_telephone');

                 $company_logo = $request->file('company_logo');
            if(!empty($company_logo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $company_logo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/FullWebSite/companies/';

             $thumb           = Image::make($company_logo)
             ->resize(950,950)->save($path.$photo_fullname);
              $NewWebSite->company_logo    = $photo_fullname;



            }

        if($NewWebSite->save()){
            $last_WebSite =FullWebSite::latest()->first();
        $WebSiteID =$last_WebSite->id;
        // here
        $code= substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',2)),0,2);

        $code.=substr(time(), -5);
                       $CloneBranch = new FullWebSiteBranch;
           $CloneBranch->branch_title_en="x";
           $CloneBranch->branch_title_ar="x";
           $CloneBranch->branch_address_en="x";
           $CloneBranch->branch_address_ar="x";
           $CloneBranch->branch_phone ="x";
           $CloneBranch->Full_WebSite_id=$WebSiteID;

           $CloneBranch->code    = $code;
            $CloneBranch->save();

        if($request->input('clone_branch_title_en'))
        {
             /**/  $CloneBranch = new FullWebSiteBranch;   /**/

$clone_branch_title_en=$request->input('clone_branch_title_en');
$clone_branch_title_ar=$request->input('clone_branch_title_ar');
$clone_branch_address_en = $request->input('clone_branch_address_en');
$clone_branch_address_ar = $request->input('clone_branch_address_ar');
$clone_branch_telephone=$request->input('clone_branch_telephone');

$clone_branches=array_merge(
$clone_branch_title_en,
$clone_branch_title_ar,
$clone_branch_address_en,
$clone_branch_address_ar,
$clone_branch_telephone
/*, $arrayN, $arrayN*/
);
//dd($clone_branches);
$ratio=count($clone_branches)/5;

    for($i=0;$i<$ratio;$i++)
    {
         $code= substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',2)),0,2);
         $code.=substr(time(), -5);

                    $NewBranch = new FullWebSiteBranch;
       if($ratio>1){
        $NewBranch->branch_title_en      =$clone_branches[$i];
        $NewBranch->branch_title_ar      =$clone_branches[$i+2];
        $NewBranch->branch_address_en    =$clone_branches[$i+4];
        $NewBranch->branch_address_ar    =$clone_branches[$i+6];
        $NewBranch->branch_phone         =$clone_branches[$i+8];
}else{
  $NewBranch->branch_title_en      =$clone_branches[$i];
        $NewBranch->branch_title_ar      =$clone_branches[$i+1];
        $NewBranch->branch_address_en    =$clone_branches[$i+2];
        $NewBranch->branch_address_ar    =$clone_branches[$i+3];
        $NewBranch->branch_phone         =$clone_branches[$i+4];
}
        $NewBranch->Full_WebSite_id=$WebSiteID;
        $NewBranch->code=$code;
                             $NewBranch->save();
    }
        }
        if($request->input('product_name_en'))
        {

$product_name_en=$request->input('product_name_en');
$product_name_ar=$request->input('product_name_ar');
$product_desc_en = $request->input('product_desc_en');
$product_desc_ar = $request->input('product_desc_ar');
$product_photo=$request->file('product_photo');

$clone_products=array_merge(
$product_name_en,
$product_name_ar,
$product_desc_en,
$product_desc_ar,
$product_photo
/*, $arrayN, $arrayN*/
);
// dd($clone_products);
$ratio=count($clone_products)/5;
    for($i=0;$i<$ratio;$i++)
    {

                    $NewProduct = new FullWebSiteProducts;


       if($ratio >1){

        $NewProduct->product_name_en      =$clone_products[$i];
        $NewProduct->product_name_ar      =$clone_products[$i+2];
        $NewProduct->product_desc_en      =$clone_products[$i+4];
        $NewProduct->product_desc_ar      =$clone_products[$i+6];

                /* here we go to  uploaad photo */

$product_photo = $clone_products[$i+8];
}else{
     $NewProduct->product_name_en      =$clone_products[$i];
        $NewProduct->product_name_ar      =$clone_products[$i+1];
        $NewProduct->product_desc_en      =$clone_products[$i+2];
        $NewProduct->product_desc_ar      =$clone_products[$i+3];

                /* here we go to  uploaad photo */

$product_photo = $clone_products[$i+4];
}
            if(!empty($product_photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $product_photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
   $path            = public_path().'/photos/FullWebSite/companies/products/';

              $thumb           = Image::make($product_photo)
                                    ->save($path.$photo_fullname);
              $NewProduct->product_photo    = $photo_fullname;



            }
               /* here we finish uploaading photo */
        $NewProduct->Full_WebSite_id=$WebSiteID;

                             $NewProduct->save();
    }
        }
    //client section
    $company_clients=$request->file('company_clients');
     if(!empty($company_clients)){

// dd($company_clients);

    for($i=0;$i<count($company_clients);$i++)
    {
                $NewClient = new FullWebSiteClients;
                      /* here we go to  uploaad photo */
$Client_Photo = $company_clients[$i];

              $photo_name      = str_random(5).time();
              $photo_ext       = $Client_Photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
   $path            = public_path().'/photos/FullWebSite/companies/clients/';

              $thumb           = Image::make($Client_Photo)
                                    ->save($path.$photo_fullname);
              $NewClient->client_photo    = $photo_fullname;




                     /* here we finish uploaading photo */
        $NewClient->Full_WebSite_id=$WebSiteID;

                             $NewClient->save();
    }
     }
#########################     GOOGLE MAP SECTION     #########################
$NewMap = new MapLocation;

if(!empty($request->input('map_latx')) && !empty($request->input('map_lngx')))
{
  $map_latx=floatval($request->input('map_latx'));
  $map_lngx=floatval($request->input('map_lngx'));
if(is_float($map_latx) && is_float($map_lngx))
{
$NewMap->map_lat             =$request->input('map_latx');
$NewMap->map_lng             =$request->input('map_lngx');

}}else{
$NewMap->map_lat             =$request->input('map_lat');
$NewMap->map_lng             =$request->input('map_lng');
}
$NewMap->related_id =$WebSiteID;
$NewMap->type       = 2;
$NewMap->save();

#########################     GOOGLE MAP SECTION     #########################
 $company_sliders=$request->file('slider_photo');
if(!empty($company_sliders)){

// dd($company_sliders);

    for($i=0;$i<count($company_sliders);$i++)
    {
        if (array_key_exists($i, $company_sliders))
        {
                $NewSlider = new FullWebSiteSlider;
                      /* here we go to  uploaad photo */
$Slider_Photo = $company_sliders[$i];

              $photo_name      = str_random(5).time();
              $photo_ext       = $Slider_Photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
   $path            = public_path().'/photos/FullWebSite/companies/sliders/';

              $thumb           = Image::make($Slider_Photo)
                                    ->save($path.$photo_fullname);
              $NewSlider->slider_photo    = $photo_fullname;




                     /* here we finish uploaading photo */
        $NewSlider->Full_WebSite_id=$WebSiteID;

                             $NewSlider->save();
    }
}
}

          $email1 = "contact@example.invalid" ;//
            $msg        = "
            <h1><img src='".url('/')."/public/img/logo3.png' /></h1>
                <h4>indooy congratulation </h4>

                  <p> finaly you have created your website ..  you can see your <b>countdown </b> <a href='https://indooy.com/en/WebSite_Creation'> here </a>


            ";
$customer_name="test1";
                Mail::send('emails.new-page', ['customer_name' => $customer_name], function ($message) use ($email1){
                    $message->from($email1, 'congratulation !');
                    $message->to('contact@example.invalid')->subject('indooy | website_creation');
                });

            if(count(Mail::failures()) == 0){
$task_link ="https://indooy.com/en/WebSite_Creation/yourTask/2/" .$WebSiteID;

        alert()->success('your website created', 'Successfully')
           ->footer('<a href=' . $task_link .'>go to your task to check your website</a>')

         ->showConfirmButton()
         ->showCloseButton();
            return redirect('/en/WebSite_Creation/yourTask/2/'.$WebSiteID);
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

    }

}
}
public function get_all_edit_full_website()
{
    $items=FullWebSite::where('customer_id','=',Auth::guard('web_WebSite_Creation')->user()->id)->get();
    //  dd($items);
    return view('Web-site-Creation.WebSite.FULL_WEBSITE.all_websites')
            ->with('items',$items);
}
public function get_edit_full_website($WebSiteID)
{
$Main_Item=FullWebSite::join('countries','countries.id','full_web_sites.country_list')->join('cities','cities.id','full_web_sites.cities_list')->join('districts','districts.id','full_web_sites.district_list')->select('*','full_web_sites.id as WebSiteID')->where('full_web_sites.id','=',$WebSiteID)->first();
    //   dd($Main_Item);
   $statue=$Main_Item->statue;
     if($statue==0)
     {

$task_link ="https://indooy.com/en/WebSite_Creation/yourTask/2/" .$WebSiteID;

         alert()->info("previous request !", "we see that you have and old  request is in process , you can't edit your data before we finish your request .. thank you again!")

           ->footer('<a href=' . $task_link .'>go to your time down for more details </a><a href="https://indooy.com/en"> or looking for a something in indooy website </a>')

         ->showConfirmButton()
         ->showCloseButton();
            return redirect()->back();
     }
$Sub_Item=FullWebSiteBranch::where('Full_WebSite_id','=',$Main_Item->WebSiteID)->get();
$categories=Activity::pluck('name_en','id');
$country_list = DB::table('countries')->pluck('name','id');

$city_list = DB::table('cities')->where('country_id','=',$Main_Item->country_list)          ->pluck('name','id');

$district_list = DB::table('districts')
->where('city_id','=',$Main_Item->cities_list)
->where('country_id','=',$Main_Item->country_list)
->where('id','=',$Main_Item->district_list)
->pluck('name','id');
      // dd($district_list);
$current_location = MapLocation::where('type','=',2)
->where('related_id','=',$Main_Item->WebSiteID)->first();

if(empty($current_location))
{
    $current_location= new MapLocation;
    $current_location->map_lat=29.92332427923843;
    $current_location->map_lng=31.288006347656506;
}

$products = FullWebSiteProducts::where('Full_WebSite_id','=',$Main_Item->WebSiteID)->get();
$branches = FullWebSiteBranch::where('Full_WebSite_id','=',$Main_Item->WebSiteID)
->where('branch_title_en','!=','x')->get();
// dd($branches);
$sliders = FullWebSiteSlider::where('Full_WebSite_id','=',$Main_Item->WebSiteID)->get();
// dd($sliders);
$client_photo = FullWebSiteClients::where('Full_WebSite_id','=',$Main_Item->WebSiteID)->select('client_photo','id')->get();
$keyword_list_en=explode(',', $Main_Item->keyword_list_en);
$keyword_list_ar=explode(',', $Main_Item->keyword_list_ar);
##########################################################
$FORM_URL='/en/full_WebSite_Creation/edit_website';
##########################################################

        return view('Web-site-Creation.WebSite.FULL_WEBSITE.edit-website')
        ->with('categories',$categories)
        ->with('products',$products)
        ->with('branches',$branches)
        ->with('sliders',$sliders)
        ->with('client_photo',$client_photo)
        ->with('country_list',$country_list)
        ->with('city_list',$city_list)
        ->with('district_list',$district_list)
        ->with('Main_Item',$Main_Item)
        ->with('current_location',$current_location)
        ->with('keyword_list_en',$keyword_list_en)
        ->with('keyword_list_ar',$keyword_list_ar)
        ->with('Sub_Item',$Sub_Item)
        ->with('FORM_URL',$FORM_URL);
}
public function edit_full_website(Request $request)
{
 // dd($request->all());
  $messages = [
        'company_name_en.required'      => 'please write your company name in english',

        'company_name_ar.required'      => 'please write your company name in arabic',

        'business_email.required'       => 'please write your business email',

        'business_number.required'      =>'please write your specify',

        'keyword_list_en.required'      => "write some keywords in english",
        'keyword_list_ar.required'      => "write some keywords in arabic",
        'country_list.required'         => "your country is  is a must",
        'cities_list.required'          => "your city is is a must",
        'district_list.required'        => "your district is is a must",

        'company_full_address_en.required'        => "please write your Main address in english",
        'company_full_address_ar.required'        => "please write your Main address in arabic",

        'words_en.required'             => "write some words in english to inform user who are you ",
        'words_ar.required'             => "write some words in arabic to inform user who are you ",
        'vision_en.required'            => "write some words in english to inform user who are you ",
        'vision_ar.required'            => "write some words in arabic to inform user who are you ",
        'mission_en.required'           => "write some words in english to inform user who are you ",
        'mission_ar.required'           => "write some words in arabic to inform user who are you ",

        'category_list.required'        => "write some words in arabic to inform user who are you ",

        'product_name_en.required'      => "write some words in english to inform user who are you ",
        'product_name_ar.required'      => "write some words in english to inform user who are you ",
        'product_desc_en.required'      => "write some words in arabic to inform user who are you ",
        'product_desc_ar.required'      => "write some words in english to inform user who are you ",
        'product_photo.required'        => "write some words in english to inform user who are you ",

        'SocFacebook.required'          => "write some words in arabic to inform user who are you ",
        'SocGoogle.required'            => "write some words in english to inform user who are you ",
        'SocYoutube.required'           => "write some words in arabic to inform user who are you ",
        'website_extra.required'        => "write some words in arabic to inform user who are you ",


        'keyword_list_en.required'      => "write some words in english to inform user who are you ",
        'keyword_list_ar.required'      => "write some words in arabic to inform user who are you ",

        'clone_branch_address_title_en.required'          => "write some words in english to inform user who are you ",
        'clone_branch_title_ar.required'                  => "write some words in english to inform user who are you ",
        'clone_branch_address_en.required'                => "write some words in arabic to inform user who are you ",
        'clone_branch_address_ar.required'                => "write some words in english to inform user who are you ",
        'clone_branch_telephone.required'                 => "write some words in english to inform user who are you ",




        ];
         $validatedData = Validator::make($request->all(),[
        // 'company_name_en'    => 'required|unique:landing_pages|max:255',
        // 'company_name_ar'    => 'required|unique:landing_pages|max:255',
        'company_name_en'             => 'required|max:255',
        'company_name_ar'             => 'required|max:255',
        'business_email'              => 'required',

        'business_number'             => 'required',

        'country_list'                =>  'required',
        'cities_list'                 => 'required',
        'district_list'               => 'required',




        'company_full_address_en'     => 'required',
        'company_full_address_ar'     => 'required',

        'words_en'                    =>  'required',

         'words_ar'                   => 'required',

        'vision_en'                   => 'required',
        'vision_ar'                   => 'required',

        'mission_en'                  =>  'required',
        'mission_ar'                  => 'required',

        'category_list'               => 'required',





],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
          $update=FullWebSite::find($request->input('WebSiteID'));


$keywords_en=implode(',', $request->input('keyword_list_en'));
$keywords_ar=implode(',', $request->input('keyword_list_ar'));
$update->company_name_en         =$request->input('company_name_en');
$update->company_name_ar         =$request->input('company_name_ar');
$update->business_email          =$request->input('business_email');
$update->business_phone         =$request->input('business_number');

$update->category_list           =$request->input('category_list');
$update->client_type         =$request->input('client_type');

$update->country_list            =$request->input('country_list');
$update->cities_list             =$request->input('cities_list');
$update->district_list           =$request->input('district_list');

$update->keyword_list_en         =$keywords_en;
$update->keyword_list_ar         =$keywords_ar;


$update->company_full_address_en =$request->input('company_full_address_en');
$update->company_full_address_ar =$request->input('company_full_address_ar');

$update->desc_en                =$request->input('words_en');
$update->desc_ar                =$request->input('words_ar');
$update->vision_en               =$request->input('vision_en');
$update->vision_ar               =$request->input('vision_ar');
$update->mission_en              =$request->input('mission_en');
$update->mission_ar              =$request->input('mission_ar');

//$updateSite->company_logo            =$request->input('company_logo');

$UpdateMap = MapLocation::select('id')->where('related_id','=',$update->id)->where('type',2)->first();
if(empty($UpdateMap->id))
{
    $UpdateMap= new MapLocation;

}
if(!empty($request->input('map_latx')) && !empty($request->input('map_lngx')))
{
  $map_latx=floatval($request->input('map_latx'));
  $map_lngx=floatval($request->input('map_lngx'));
if(is_float($map_latx) && is_float($map_lngx))
{
$UpdateMap->map_lat             =$request->input('map_latx');
$UpdateMap->map_lng             =$request->input('map_lngx');

}}else{
$UpdateMap->map_lat             =$request->input('map_lat');
$UpdateMap->map_lng             =$request->input('map_lng');
}
$UpdateMap->related_id = $update->id;
$UpdateMap->type       = 2;
//dd($UpdateMap);
$UpdateMap->save();
$update->facebookAcc             =$request->input('SocFacebook');

$update->facebookAcc             =$request->input('SocFacebook');
$update->googleAcc              =$request->input('SocGoogle');
$update->youtubeAcc               =$request->input('SocYoutube');
$update->website_extra           =$request->input('website_extra');

$iframe_videos_full                   =$request->input('iframe_videos');
$iframe_link = app('App\Http\Controllers\Full_website_creation')
      ->get_string_between($iframe_videos_full, " src=", " frameborder=");

$update->iframe_videos=$iframe_link;
                    // $branches_en = $request->input('address_en');
                    // $branches_ar = $request->input('address_ar');
                    // $branch_title_en=$request->input('cloneaddresstitle_en');
                    // $branch_title_ar=$request->input('cloneaddresstitle_ar');
                    // $branch_phone=$request->input('address_telephone');
                        ##############################
                    $update->statue =0;
                        ###############################
                 $company_logo = $request->file('company_logox');
            if(!empty($company_logo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $company_logo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/FullWebSite/companies/';

              $thumb           = Image::make($company_logo)->resize(950,950)
                                    ->save($path.$photo_fullname);
              $update->company_logo    = $photo_fullname;
            }
 if($update->save()){
            $last_WebSite =FullWebSite::latest()->first();
        $WebSiteID =$last_WebSite->id;
        // here
        $code= substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',2)),0,2);

        $code.=substr(time(), -5);

        if($request->input('clone_branch_title_en'))
        {
             /**/  $CloneBranch = new FullWebSiteBranch;   /**/

$clone_branch_title_en=$request->input('clone_branch_title_en');
$clone_branch_title_ar=$request->input('clone_branch_title_ar');
$clone_branch_address_en = $request->input('clone_branch_address_en');
$clone_branch_address_ar = $request->input('clone_branch_address_ar');
$clone_branch_telephone=$request->input('clone_branch_telephone');

$clone_branches=array_merge(
$clone_branch_title_en,
$clone_branch_title_ar,
$clone_branch_address_en,
$clone_branch_address_ar,
$clone_branch_telephone
/*, $arrayN, $arrayN*/
);
 // dd($clone_branches);
$ratio=count($clone_branches)/5;

    for($i=0;$i<$ratio;$i++)
    {
         $code= substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',2)),0,2);
         $code.=substr(time(), -5);

                    $NewBranch = new FullWebSiteBranch;


             if($ratio>1){
        $NewBranch->branch_title_en      =$clone_branches[$i];
        $NewBranch->branch_title_ar      =$clone_branches[$i+2];
        $NewBranch->branch_address_en    =$clone_branches[$i+4];
        $NewBranch->branch_address_ar    =$clone_branches[$i+6];
        $NewBranch->branch_phone         =$clone_branches[$i+8];
}else{
  $NewBranch->branch_title_en      =$clone_branches[$i];
        $NewBranch->branch_title_ar      =$clone_branches[$i+1];
        $NewBranch->branch_address_en    =$clone_branches[$i+2];
        $NewBranch->branch_address_ar    =$clone_branches[$i+3];
        $NewBranch->branch_phone         =$clone_branches[$i+4];
}

        $NewBranch->Full_WebSite_id=$WebSiteID;
        $NewBranch->code=$code;
                             $NewBranch->save();
    }
        }
if($request->input('product_name_en'))
        {
$product_name_en=$request->input('product_name_en');
$product_name_ar=$request->input('product_name_ar');
$product_desc_en = $request->input('product_desc_en');
$product_desc_ar = $request->input('product_desc_ar');
$product_photo=$request->file('product_photo');

$clone_products=array();
$clone_products=array_merge(
$product_name_en,
$product_name_ar,
$product_desc_en,
$product_desc_ar,
$product_photo
/*, $arrayN, $arrayN*/
);
 // dd($clone_products);
$ratio=count($clone_products)/5;
    for($i=0;$i<$ratio;$i++)
    {
                    $NewProduct = new FullWebSiteProducts;
       if($ratio >1){

        $NewProduct->product_name_en      =$clone_products[$i];
        $NewProduct->product_name_ar      =$clone_products[$i+2];
        $NewProduct->product_desc_en      =$clone_products[$i+4];
        $NewProduct->product_desc_ar      =$clone_products[$i+6];

                /* here we go to  uploaad photo */

$product_photo = $clone_products[$i+8];
}else{
     $NewProduct->product_name_en      =$clone_products[$i];
        $NewProduct->product_name_ar      =$clone_products[$i+1];
        $NewProduct->product_desc_en      =$clone_products[$i+2];
        $NewProduct->product_desc_ar      =$clone_products[$i+3];

                /* here we go to  uploaad photo */

$product_photo = $clone_products[$i+4];
}

            if(!empty($product_photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $product_photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
   $path            = public_path().'/photos/FullWebSite/companies/products/';

              $thumb           = Image::make($product_photo)
                                    ->save($path.$photo_fullname);
              $NewProduct->product_photo    = $photo_fullname;



            }
               /* here we finish uploaading photo */
        $NewProduct->Full_WebSite_id=$WebSiteID;

                             $NewProduct->save();
    }
  }
    //client section

    $company_clients=$request->file('company_clients');


 if(!empty($company_clients)){
    for($i=0;$i<count($company_clients);$i++)
    {
                $NewClient = new FullWebSiteClients;
                      /* here we go to  uploaad photo */
$Client_Photo = $company_clients[$i];

              $photo_name      = str_random(5).time();
              $photo_ext       = $Client_Photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
   $path            = public_path().'/photos/FullWebSite/companies/clients/';

              $thumb           = Image::make($Client_Photo)
                                    ->save($path.$photo_fullname);
              $NewClient->client_photo    = $photo_fullname;




                     /* here we finish uploaading photo */
        $NewClient->Full_WebSite_id=$WebSiteID;

                             $NewClient->save();
    }
  }

    $company_sliders=$request->file('slider_photo');

// dd($company_sliders);
if(!empty($company_sliders)){
    for($i=1;$i<=4;$i++)
    {
        if (array_key_exists($i, $company_sliders))
        {
                $NewSlider = new FullWebSiteSlider;
                      /* here we go to  uploaad photo */
$Slider_Photo = $company_sliders[$i];

              $photo_name      = str_random(5).time();
              $photo_ext       = $Slider_Photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
   $path            = public_path().'/photos/FullWebSite/companies/sliders/';

              $thumb           = Image::make($Slider_Photo)
                                    ->save($path.$photo_fullname);
              $NewSlider->slider_photo    = $photo_fullname;




                     /* here we finish uploaading photo */
        $NewSlider->Full_WebSite_id=$WebSiteID;

                             $NewSlider->save();
    }
}
}

          $email1 = "contact@example.invalid" ;//
            $msg        = "
            <h1><img src='".url('/')."/public/img/logo3.png' /></h1>
                <h4>indooy congratulation </h4>

                  <p> we recive your edit request for your website ..  you can see your <b>countdown </b> <a href='https://indooy.com/en/WebSite_Creation/yourTask/2'> here </a>


            ";
$customer_name="test1";
                Mail::send('emails.new-page', ['customer_name' => $customer_name], function ($message) use ($email1){
                    $message->from($email1, 'congratulation !');
                    $message->to('contact@example.invalid')->subject('indooy | website_creation');
                });

            if(count(Mail::failures()) == 0){
$task_link ="https://indooy.com/en/WebSite_Creation/yourTask/2/" .$WebSiteID;

        alert()->success('your website has been created', 'Successfully')

           ->footer('<a href=' . $task_link .'>go to your task to check your landing page</a>')

         ->showConfirmButton()
         ->showCloseButton();
            return redirect('/en/WebSite_Creation/yourTask/2/'.$WebSiteID );
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

    }

}
}


public function get_all_full_website_branch($WebSiteID)
{
  // $customerID_auth=Auth::guard('web_WebSite_Creation')->user()->id;
   $FullWebSite = FullWebSite::where('id',$WebSiteID)->first();

  $all_branches = FullWebSiteBranch::where('Full_WebSite_id',$WebSiteID)->get();
  // dd()
   return view('Web-site-Creation.WebSite.FULL_WEBSITE.all_branches')
   ->with('all_branches',$all_branches)
   ->with('FullWebSite',$FullWebSite)
   ->with('WebSiteID',$WebSiteID);
}
public function get_edit_full_website_branch($BranchID)
{

  $item= FullWebSiteBranch::where('id',$BranchID)->first();

  return view('Web-site-Creation.WebSite.FULL_WEBSITE.edit_branches')
       ->with('item',$item)
       ->with('BranchID',$BranchID);
}
public function edit_full_website_branch(Request $request)
{
 $messages = [

        'clone_branch_title_en.required'          => "write some words in english to inform user who are you ",
        'clone_branch_title_ar.required'                  => "write some words in english to inform user who are you ",
        'clone_branch_address_en.required'                => "write some words in arabic to inform user who are you ",
        'clone_branch_address_ar.required'                => "write some words in english to inform user who are you ",
        'clone_branch_telephone.required'                 => "write some words in english to inform user who are you ",




        ];
         $validatedData = Validator::make($request->all(),[
        'clone_branch_title_en'                           => 'required',
        'clone_branch_title_ar'                           => 'required',
        'clone_branch_address_en'                         => 'required',
        'clone_branch_address_ar'                         => 'required',
        'clone_branch_telephone'                          => 'required|numeric|min:6',

],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
      $update = FullWebSiteBranch::where('id',$request->BranchID)->first();
// dd($request->all());
        $update->branch_title_en     =$request->clone_branch_title_en;
        $update->branch_title_ar      =$request->clone_branch_title_ar;
        $update->branch_address_en    =$request->clone_branch_address_en;
        $update->branch_address_ar    =$request->clone_branch_address_ar;
        $update->branch_phone         =$request->clone_branch_telephone;

        if($update->save()){
        alert()->success('your branch had been updated', 'Successfully')

         ->showConfirmButton()
         ->showCloseButton();
            return redirect()->back();
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
}

public function get_all_full_website_products($WebSiteID)
{

  $FullWebSite = FullWebSite::where('id',$WebSiteID)->select('id')->first();

  $all_products = FullWebSiteProducts::where('Full_WebSite_id',$FullWebSite->id)->get();
  // dd()
   return view('Web-site-Creation.WebSite.FULL_WEBSITE.all_products')
   ->with('all_products',$all_products)
   ->with('FullWebSite',$FullWebSite);
}
public function get_edit_full_website_products($productID)
{

  $item= FullWebSiteProducts::where('id',$productID)->first();

  return view('Web-site-Creation.WebSite.FULL_WEBSITE.edit_products')
       ->with('item',$item)
       ->with('productID',$productID);
}
public function edit_full_website_products(Request $request)
{
  // dd($request->all());

 $messages = [

        'product_name_en.required'                => "product name in english you ",
        'product_name_ar.required'                => "product name in arabic ",
        'product_desc_en.required'                => "product descreption in english ",
        'product_desc_ar.required'                => "product description in arabic",

        ];
         $validatedData = Validator::make($request->all(),[
        'product_name_en'                         => 'required',
        'product_name_ar'                         => 'required',
        'product_desc_en'                         => 'required',
        'product_desc_ar'                         => 'required',

],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
      $update = FullWebSiteProducts::where('id',$request->productID)->first();

// dd($request->all());
        $update->product_name_en     =$request->product_name_en;
        $update->product_name_ar      =$request->product_name_ar;
        $update->product_desc_en    =$request->product_desc_en;
        $update->product_desc_ar    =$request->product_desc_ar;

        if ($request->hasFile('product_photo')) {
              $product_photo=$request->product_photo;
              $photo_name      = str_random(5).time();
              $photo_ext       = $product_photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
   $path            = public_path().'/photos/FullWebSite/companies/products/';

              $thumb           = Image::make($product_photo)
                                    ->save($path.$photo_fullname);
              $update->product_photo    = $photo_fullname;
            }
        if($update->save()){
        alert()->success('your product had been updated', 'Successfully')

         ->showConfirmButton()
         ->showCloseButton();
            return redirect()->back();
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
}

public function get_Full_website(Request $request,$lang='ar',$categoryname,
                                 $code,
                                 $company_name,
                                 $type=''
                                )
{
  // $perma_link =url()->full();
// dd($type);
   $item =FullWebSiteBranch::join('full_web_sites','full_web_sites.id','full_web_site_branches.Full_WebSite_id')
    ->Where('full_web_site_branches.code', '=',$code)
    ->select('*','full_web_sites.id as me_id')->first();

//      dd($results);
        $LandingID=$item->me_id;
        if($item->statue==0)
        {
             return  redirect('/ar/');
        }
$MainCode=FullWebSiteBranch::where('Full_WebSite_id','=',$LandingID)->select('code')->first();
        $MainCode=$MainCode->code;

$branches_items=FullWebSiteBranch::where('Full_WebSite_id','=',$LandingID)->get();
        if (Config::get('app.locale')=='en')
        {
          $item->name_ar=$item->name_en;
          $item->company_name_ar=$item->company_name_en;
          $item->company_full_address_ar=$item->company_full_address_en;
          $item->desc_ar=$item->desc_en;
          $item->vision_ar=$item->vision_en;
          $item->mission_ar=$item->mission_en;
          $item->branch_title_ar=$item->branch_title_en;
          $item->branch_address_ar=$item->branch_address_en;
                foreach ($branches_items as $itemx)
                 {
                   $itemx->branch_title_ar=$itemx->branch_title_en;
                   $itemx->branch_address_ar=$itemx->branch_address_en;

                 }
        }
          // dd($item);
        // dd($request->all());


//$branches_items->merge($item);
// $array = array_merge($item->toArray(), $branches_items->toArray());
//   dd($array);
// dd($branches_items);
         if (count(request()->segments())<6) {

$sliders=FullWebSiteSlider::where('Full_WebSite_id','=',$LandingID)->orderBy('id', 'desc')->take(4)->get();
$clients=FullWebSiteClients::where('Full_WebSite_id','=',$LandingID)->get();

return view ('Web-site-Creation.WebSite.index')
        ->with('item',$item)
        ->with('branches_items',$branches_items)
        ->with('sliders',$sliders)
        ->with('clients',$clients)
        ->with('categoryname',$categoryname)
        ->with('MainCode',$MainCode)
        ->with('type',$type);
         }elseif($type=="products"){

$products=FullWebSiteProducts::where('Full_WebSite_id','=',$LandingID)->paginate(8);
return view ('Web-site-Creation.WebSite.products')
        ->with('item',$item)
        ->with('products',$products);

         }elseif($type=="offers"){

$products=FullWebSiteProducts::where('Full_WebSite_id','=',$LandingID)->get();
return view ('Web-site-Creation.WebSite.products')
        ->with('item',$item)
        ->with('products',$products);

         }elseif($type=="contact-us"){

$branches_items=FullWebSiteBranch::where('Full_WebSite_id','=',$LandingID)->get();
if (preg_match('/"([^"]+)"/', $item->iframe_videos, $m)) {

}
if(!empty($m)){
 $item->iframe_videos= $m[1];
}else{
    $item->iframe_videos="https://www.youtube-nocookie.com/embed/7QU1nvuxaMA";
}

return view ('Web-site-Creation.WebSite.contactUS')
        ->with('item',$item)
        ->with('MainCode',$MainCode)
        ->with('categoryname',$categoryname)
        ->with('branches_items',$branches_items);

         }elseif($type=="search"){

 return app('App\Http\Controllers\Full_website_creation')
      ->web_site_search($request->input('q'),$item,$LandingID);
         }
}
public function web_site_search($query,$item,$LandingID)
{
    $products=FullWebSiteProducts::where('Full_WebSite_id','=',$LandingID);
    $products=$products->Where('product_name_ar', 'LIKE', '%'.$query.'%')
     ->orWhere('product_name_en', 'LIKE', '%'.$query.'%')
     ->orWhere('product_desc_ar', 'LIKE', '%'.$query.'%')
     ->orWhere('product_desc_en', 'LIKE', '%'.$query.'%')->paginate(4);
     return view ('Web-site-Creation.WebSite.products')
          ->with('item',$item)
          ->with('products',$products);
}
####delete
public function delete_full_website_branch($BranchID)
{
    $delete= FullWebSiteBranch::find($BranchID);
 if( $delete->delete()){
           alert()->success('the branch has been deleted successfully', 'Successfully')
           ->showConfirmButton()
            ->showCloseButton();;
            return redirect()->back();
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

}
public function delete_client_photo($PhotoID)
{
$delete= FullWebSiteClients::find($PhotoID);
if(!empty ($delete->client_photo) ){
$path_photo    = public_path().'/photos/FullWebSite/companies/clients/'.$delete->client_photo;
if(file_exists($path_photo)){
unlink($path_photo);
}
}

          if( $delete->delete()){
           alert()->success('photo deleted successfully', 'Successfully');
            return redirect()->back();
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

}
public function delete_website_slider($PhotoID)
{
$delete= FullWebSiteSlider::find($PhotoID);
if(!empty ($delete->slider_photo) ){
$path_photo    = public_path().'/photos/FullWebSite/companies/sliders/'.$delete->slider_photo;
if(file_exists($path_photo)){
unlink($path_photo);
}
}
          if( $delete->delete()){
           alert()->success('photo deleted successfully', 'Successfully');
            return redirect()->back();
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

}
public function delete_full_website_product($productID)
{
    $delete= FullWebSiteProducts::find($productID);
          if(!empty ($delete->product_photo) ){
        $path_photo    = public_path().'/photos/FullWebSite/companies/products/'.$delete->product_photo;
           if(file_exists($path_photo)){
        unlink($path_photo);
      }
    }

 if( $delete->delete()){
           alert()->success('the product has been deleted successfully', 'Successfully')
           ->showConfirmButton()
            ->showCloseButton();;
            return redirect()->back();
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
}
public function delete_full_website_logo($productID)
{
    $delete= FullWebSite::find($productID);
    // dd($delete);
          if(!empty ($delete->company_logo) ){
        $path_photo    = public_path().'/photos/FullWebSite/companies/'.$delete->company_logo;

             if(file_exists($path_photo)){

              dd(unlink($path_photo));
         }
    }
if( $delete->delete()){
           alert()->success('the product has been deleted successfully', 'Successfully')
           ->showConfirmButton()
            ->showCloseButton();;
            return redirect()->back();
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
}
//forcedelete()
public function delete_full_website($WebSiteID)
{
  $delete=FullWebSite::find($WebSiteID);
  // dd($delete);
  $branches=FullWebSiteBranch::where('Full_WebSite_id','=',$delete->id)->get();
  $clients=FullWebSiteClients::where('Full_WebSite_id','=',$delete->id)->get();
  $products=FullWebSiteProducts::where('Full_WebSite_id','=',$delete->id)->get();
  $sliders=FullWebSiteSlider::where('Full_WebSite_id','=',$delete->id)->get();
foreach ($branches as $item) {
  $this->delete_full_website_branch($item->id);
}
foreach ($clients as $item) {
$this->delete_client_photo($item->id);
}
foreach ($products as $item) {
$this->delete_full_website_product($item->id);
}
foreach ($sliders as $item) {
     $this->delete_website_slider($item->id);
}
return $this->delete_full_website_logo($delete->id);
#delete

}
public function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
}



