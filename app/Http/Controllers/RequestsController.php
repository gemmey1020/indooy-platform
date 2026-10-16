<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPage;
use App\WebSiteCreation;
use App\LandingPage_branches;
use App\FullWebSite;
use App\MapLocation;
use App\FullWebSiteBranch;
use App\FullWebSiteClients;
use App\FullWebSiteProducts;
use App\FullWebSiteSlider;
use App\Activity;
use App\Inquiry;
use Session;
use Image;
use Validator;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use Mail;
use Config;

class RequestsController extends Controller
{

    public function get_requests($type)
    {

        if($type=='add')
        {
            // ('MOD(statue, 2) = 0')
$items=LandingPage::where('review','=',0)->select('*')->get();
        }elseif($type=='edit'){
$items=LandingPage::where('review','!=',0)->where('statue','=',0)->select('*')->get();
        }elseif($type=='addx')
        {
            // ('MOD(statue, 2) = 0')
$items=FullWebSite::where('review','=',0)->select('*')->get();
        }elseif($type=='editx'){
$items=FullWebSite::where('review','!=',0)->where('statue','=',0)->select('*')->get();
        }

        return view('Admin.LANDING.all_add_landing_requests')->with('items',$items)->with('type',$type);
    }
    public function get_request($type,$LandingID)
    {

        if($type=="addx" || $type=="editx" )
        {

            return $this->get_requestx($type,$LandingID);
        }

            $Main_Item=LandingPage::join('countries','countries.id','landing_pages.country_list')->join('cities','cities.id','landing_pages.cities_list')->join('districts','districts.id','landing_pages.district_list')->select('*','landing_pages.id as LandingID')->where('landing_pages.id','=',$LandingID)->first();

            $Sub_Item=LandingPage_branches::where('landing_page_id','=',$Main_Item->id)->get();
            $category_list=Activity::pluck('name_en','id');

$country_list = DB::table('countries')->pluck('name','id');

$city_list = DB::table('cities')->where('country_id','=',$Main_Item->country_list)->pluck('name','id');

$district_list = DB::table('districts')
->where('city_id','=',$Main_Item->cities_list)
->where('country_id','=',$Main_Item->country_list)
->where('id','=',$Main_Item->district_list)
->pluck('name','id');

   $current_location = MapLocation::where('type','=',1)
->where('related_id','=',$Main_Item->WebSiteID)->first();

if(empty($current_location))
{
    $current_location= new MapLocation;
    $current_location->map_lat=29.92332427923843;
    $current_location->map_lng=31.288006347656506;
}
//  dd($Main_Item->district_list);
        return view('Admin.LANDING.add_landing_request')
        ->with('category_list',$category_list)
        ->with('country_list',$country_list)
        ->with('city_list',$city_list)
        ->with('district_list',$district_list)
        ->with('Main_Item',$Main_Item)
        ->with('Sub_Item',$Sub_Item)
        ->with('LandingID',$LandingID)
        ->with('current_location',$current_location)
        ->with('type',$type);
    }
     public function get_requestx($type,$WebSiteID)
    {
$Main_Item=FullWebSite::join('countries','countries.id','full_web_sites.country_list')->join('cities','cities.id','full_web_sites.cities_list')->join('districts','districts.id','full_web_sites.district_list')->select('*','full_web_sites.id as WebSiteID')->where('full_web_sites.id','=',$WebSiteID)->first();
      // dd($Main_Item);
$Sub_Item=FullWebSiteBranch::where('Full_WebSite_id','=',$Main_Item->WebSiteID)->get();
$categories=Activity::pluck('name_en','id');
$country_list = DB::table('countries')->pluck('name','id');

$city_list = DB::table('cities')->where('country_id','=',$Main_Item->country_list)->pluck('name','id');

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
$sliders = FullWebSiteSlider::where('Full_WebSite_id','=',$Main_Item->WebSiteID)->select('slider_photo')->get();
$client_photo = FullWebSiteClients::where('Full_WebSite_id','=',$Main_Item->WebSiteID)->select('client_photo','id')->get();
$keyword_list_en=explode(',', $Main_Item->keyword_list_en);
$keyword_list_ar=explode(',', $Main_Item->keyword_list_ar);
##########################################################
$FORM_URL='/Admin_Dashboard/Request/' . $type . '/' . $WebSiteID;

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
         ->with('current_location',$current_location)
        ->with('Main_Item',$Main_Item)
        ->with('keyword_list_en',$keyword_list_en)
        ->with('keyword_list_ar',$keyword_list_ar)
        ->with('Sub_Item',$Sub_Item)
        ->with('FORM_URL',$FORM_URL)
        ->with('type',$type)
        ->with('WebSiteID',$WebSiteID);
}
    public function request(Request $request ,$type,$LandingID)
    {
        if($type=="addx" || $type=="editx" )
        {

            return $this->requestx( $request,$type,$LandingID);
        }
            $messages = [
            'company_name_en.required'              => 'please write your company name in english',

            'company_name_ar.required'           => 'please write your company name in arabic',

            'business_email.required'             => 'please write your business email',

            'category_list.required'              =>'please write your specify',


            'keyword_list_en.required'        => "write some keywords in english",
            'keyword_list_ar.required'        => "write some keywords in arabic",

            'Main_address_en.required'        => "please write your Main address in english",
            'Main_address_ar.required'        => "please write your Main address in arabic",

            'country_list.required'        => "your country is  is a must",
            'cities_list.required'        => "your city is is a must",
            'district_list.required'        => "your district is is a must",


            'business_phone.required'        => "product's Photo is is a must",

            'desc_en.required'        => "write some words in english to inform user who are you ",
            'desc_ar.required'        => "write some words in arabic to inform user who are you ",

            'company_logo.image'           => 'upload a Valid photo',

        ];
         $validatedData = Validator::make($request->all(),[

        'company_name_en'    => 'required|max:255',
        'company_name_ar'    => 'required|max:255',
        'business_email'      => 'required',

        'category_list'     => 'required',
        'keyword_list_en'     => 'required',
        'keyword_list_ar'     => 'required',

        'country_list'     =>  'required',
        'cities_list'      => 'required',
        'district_list'     => 'required',

        'Main_address_en'     => 'required',
        'Main_address_ar'     => 'required',

        'business_phone'     =>  'required',

        'desc_en'     => 'required',
        'desc_ar'     =>  'required',



],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
        $update=LandingPage::find($LandingID);
        $keywords_en=implode(',', $request->input('keyword_list_en'));
         $keywords_ar=implode(',', $request->input('keyword_list_ar'));
                $update->company_name_en         =$request->input('company_name_en');
        $update->company_name_ar          =$request->input('company_name_ar');
        $update->business_email           =$request->input('business_email');

        $update->category_list            =$request->input('category_list');
        //$update->client_type              =$request->input('client_type');

        $update->keyword_list_en          =$keywords_en;
        $update->keyword_list_ar          =$keywords_ar;

        $update->country_list             =$request->input('country_list');
        $update->cities_list              =$request->input('cities_list');
        $update->district_list            =$request->input('district_list');

        $update->Main_address_en          =$request->input('Main_address_en'); $update->Main_address_ar               =$request->input('Main_address_ar');
        $update->business_phone           =$request->input('business_phone');

        $update->desc_en                  =$request->input('desc_en');
        $update->desc_ar                  =$request->input('desc_ar');
                    if($type=="add")
                    {
                         $update->statue=1;


                        }elseif($type=="edit"){
                         $update->statue=1;
                         $update->edit_count +=1;
                        }
                    $update->review+=1;


        if(!empty($company_logo)){
        $update->company_logo            =$request->input('company_logo');
    }
        $update->website_extra           =$request->input('website_extra');

                   $branches_en = $request->input('address_en');
                    $branches_ar = $request->input('address_ar');
                    $branch_title_en=$request->input('cloneaddresstitle_en');
                    $branch_title_ar=$request->input('cloneaddresstitle_ar');
                    $branch_phone=$request->input('address_telephone');

                    $company_logo = $request->file('company_logo');

        $update->facebookAcc             =$request->input('SocFacebook');
        $update->googleAcc              =$request->input('SocGoogle');
        $update->youtubeAcc               =$request->input('SocYoutube');
                    $branches = $request->input('address');
                    $branch_title=$request->input('cloneaddresstitle');
                    $branch_phone=$request->input('address_telephone');
            if(!empty($company_logo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $company_logo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/LandingPages/companies/';

              $thumb           = Image::make($company_logo)
                                    ->save($path.$photo_fullname);
              $update->company_logo    = $photo_fullname;
            }
$UpdateMap = MapLocation::select('id')->where('related_id','=',$update->id)->where('type',1)->first();
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
$UpdateMap->type       = 1;
//dd($UpdateMap);
$UpdateMap->save();
        if($update->save()){
            $current_branches=LandingPage_branches::where('landing_page_id','=',$request->input('ID'))->get();

            $defferance=count($branch_title)-count($current_branches);
          for($i=1;$i<count($current_branches);$i++)

            {
                 //dd($current_branches[2]);
               $current_branches[$i]->branch_address_en=$branches_en[$i];
                $current_branches[$i]->branch_address_ar=$branches_ar[$i];

                $current_branches[$i]->branch_title_en=$branch_title_en[$i];
                $current_branches[$i]->branch_title_ar=$branch_title_ar[$i];
                $current_branches[$i]->branch_phone=$branch_phone[$i];
                        $current_branches[$i]->save();

                    }

            if($defferance>=0)
                {

                for ($i=count($current_branches); $i <=count($branch_title) ; $i++)
                {

                $code= substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',2)),0,2);
                $digits = 5;
                $code.=rand(pow(10, $digits-1), pow(10, $digits)-1);
                        $NewBranch = new LandingPage_branches;
                        $NewBranch->branch_address_en=$branches_en[$i];
                        $NewBranch->branch_address_ar=$branches_ar[$i];
                        $NewBranch->branch_title_en=$branch_title_en[$i];
                        $NewBranch->branch_title_ar=$branch_title_ar[$i];
                        $NewBranch->branch_phone=$branch_phone[$i];
                        $NewBranch->landing_page_id=$update->id;
                        $NewBranch->code=$code;
                        $NewBranch->save();
                }
        }
        if($type!="ADMIN_EDIT")
        {

                  $email1 = "contact@example.invalid" ;//
            $msg        = "
            <h1><img src='".url('/')."/public/img/logo3.png' /></h1>
                <h4>indooy congratulation </h4>

                  <p> we send this mail to tell you that your landing page had our aproval ..


            ";

                Mail::send('emails.send', ['msg' => $msg], function ($message) use ($email1){
                    $message->from($email1, 'congratulation !');
                    $message->to('contact@example.invalid')->subject('indooy | website_creation');
                });
           }
            if(count(Mail::failures()) == 0 || $type=="ADMIN_EDIT" ){
        notify()->flash('landing page has been accepted successfully', 'success');
            return redirect('/en/Admin_Dashboard/');
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
    }
    }
    public function requestx(Request $request ,$type,$WebSiteID)
    {

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
$update->client_type             =$request->input('client_type');

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


        //$NewWebSite->company_logo            =$request->input('company_logo');

#########################     GOOGLE MAP SECTION     #########################

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
#########################     GOOGLE MAP SECTION     #########################
$update->facebookAcc             =$request->input('SocFacebook');
$update->googleAcc              =$request->input('SocGoogle');
$update->youtubeAcc               =$request->input('SocYoutube');
$update->website_extra           =$request->input('website_extra');


$iframe_videos_full                   =$request->input('iframe_videos');
$iframe_link = app('App\Http\Controllers\Full_website_creation')
      ->get_string_between($iframe_videos_full, " src=", " frameborder=");

$update->iframe_videos=$iframe_link;
// dd($iframe_link);
                    // $branches_en = $request->input('address_en');
                    // $branches_ar = $request->input('address_ar');
                    // $branch_title_en=$request->input('cloneaddresstitle_en');
                    // $branch_title_ar=$request->input('cloneaddresstitle_ar');
                    // $branch_phone=$request->input('address_telephone');
            #####    ##############################       ########
                    if($type=="addx")
                    {
                         $update->statue=1;


                        }elseif($type=="editx"){
                         $update->statue=1;
                         $update->edit_count +=1;
                        }
                    $update->review+=1;
                        ###############################
                 $company_logo = $request->file('company_logox');
            if(!empty($company_logo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $company_logo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/FullWebSite/companies/';

              $thumb           = Image::make($company_logo)
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

          if($type!="ADMIN_EDIT")
        {

                  $email1 = "contact@example.invalid" ;//
            $msg        = "
            <h1><img src='".url('/')."/public/img/logo3.png' /></h1>
                <h4>indooy congratulation </h4>

                  <p> we send this mail to tell you that your landing page had our aproval ..


            ";

                Mail::send('emails.send', ['msg' => $msg], function ($message) use ($email1){
                    $message->from($email1, 'congratulation !');
                    $message->to('contact@example.invalid')->subject('indooy | website_creation');
                });
           }
            if(count(Mail::failures()) == 0 || $type=="ADMIN_EDIT" ){
        notify()->flash('The Full website has been accepted successfully', 'success');
            return redirect('/en/Admin_Dashboard/');
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

    }

}
    }
    public function get_all_websites()
    {
        $items=FullWebSite::get();
        return view('Admin/WebSite/all_websites')->with('items',$items);
    }
}
