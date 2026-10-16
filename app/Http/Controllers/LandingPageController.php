<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPage;
use App\WebSiteCreation;
use App\FullWebSite;
use App\LandingPage_branches;
use App\MapLocation;
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
class LandingPageController extends Controller
{
     public function get_add_landing_page()
    {
   //      $customer_name="jemy";
   //      $email1="contact@example.invalid";
   // Mail::send('emails.new-page', ['customer_name' => $customer_name], function ($message) use ($email1,$customer_name){
   //                  $message->from($email1, 'congratulation !');
   //                  $message->to('contact@example.invalid')->subject('indooy | website_creation');
   //              });
    $country_list = DB::table('countries')->pluck('name','id');

    $categories=Activity::select('name_en','id')->get();
        return view('Web-site-Creation.new-landing-page')->with('country_list',$country_list)->with('categories',$categories);

    }

    public function add_landing_page(Request $request)
    {

   // dd($request->all()) ;

         $messages = [
            'company_name_en.required'              => 'please write your company name in english',

            'company_name_ar.required'           => 'please write your company name in arabic',

            'business_email.required'             => 'please write your business email',

            'category_list.required'              =>'please write your specify',

            'keyword_list_en.required'        => "write some keywords in english",
            'keyword_list_ar.required'        => "write some keywords in arabic",
            'country_list.required'        => "your country is  is a must",
            'cities_list.required'        => "your city is is a must",
            'district_list.required'        => "your district is is a must",

            'Main_address_en.required'        => "please write your Main address in english",
            'Main_address_ar.required'        => "please write your Main address in arabic",

            'business_phone.required'        => "product's Photo is is a must",

            'desc_en.required'        => "write some words in english to inform user who are you ",
            'desc_ar.required'        => "write some words in arabic to inform user who are you ",

            'company_logo.required'           => 'upload a Valid photo',
            'company_logo.image'           => 'upload a Valid photo',

        ];
         $validatedData = Validator::make($request->all(),[
        // 'company_name_en'    => 'required|unique:landing_pages|max:255',
        // 'company_name_ar'    => 'required|unique:landing_pages|max:255',
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
        'company_logo'     => 'required',


],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
         $keywords_en=implode(',', $request->input('keyword_list_en'));
         $keywords_ar=implode(',', $request->input('keyword_list_ar'));
         $customerID=
WebSiteCreation::select('id')->where('name',"=",$request->input('customer_name'))->first();
$customer_name=$request->input('customer_name');

        $customerID_auth=$customerID->id;
        $NewLanding = new LandingPage;

                $NewLanding->customer_id         =$customerID_auth;

$NewLanding->company_name_en         =$request->input('company_name_en');
$NewLanding->company_name_ar         =$request->input('company_name_ar');

        $NewLanding->business_email          =$request->input('business_email');
        $NewLanding->category_list           =$request->input('category_list');

$NewLanding->keyword_list_en            =$keywords_en;
$NewLanding->keyword_list_ar            =$keywords_ar;

        $NewLanding->country_list            =$request->input('country_list');
        $NewLanding->cities_list             =$request->input('cities_list');
        $NewLanding->district_list           =$request->input('district_list');

$NewLanding->Main_address_en            =$request->input('Main_address_en');
$NewLanding->Main_address_ar            =$request->input('Main_address_ar');

        $NewLanding->business_phone          =$request->input('business_phone');

        $NewLanding->desc_en                 =$request->input('desc_en');
        $NewLanding->desc_ar                 =$request->input('desc_ar');
        $NewLanding->company_logo            =$request->input('company_logo');
        $NewLanding->website_extra           =$request->input('website_extra');



                    $branches_en = $request->input('address_en');
                    $branches_ar = $request->input('address_ar');
                    $branch_title_en=$request->input('cloneaddresstitle_en');
                    $branch_title_ar=$request->input('cloneaddresstitle_ar');
                    $branch_phone=$request->input('address_telephone');

        $NewLanding->facebookAcc             =$request->input('SocFacebook');
        $NewLanding->googleAcc              =$request->input('SocGoogle');
        $NewLanding->youtubeAcc               =$request->input('SocYoutube');
                 $company_logo = $request->file('company_logo');
            if(!empty($company_logo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $company_logo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/LandingPages/companies/';

              $thumb           = Image::make($company_logo)
                                    ->save($path.$photo_fullname);
              $NewLanding->company_logo    = $photo_fullname;

        $code= substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',2)),0,2);
       $digits = 5;
        $code.=rand(pow(10, $digits-1), pow(10, $digits)-1);

            }

        if($NewLanding->save()){
            $last_Landing =LandingPage::latest()->first();
        $LandingID =$last_Landing->id;

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
$NewMap->related_id =$LandingID;
$NewMap->type       = 1;
$NewMap->save();

#########################     GOOGLE MAP SECTION     #########################

        if($request->input('address_en'))
        {
                       $CloneBranch = new LandingPage_branches;
           $CloneBranch->branch_title_en="x";
           $CloneBranch->branch_title_ar="x";
           $CloneBranch->branch_address_en="x";
           $CloneBranch->branch_address_ar="x";
           $CloneBranch->landing_page_id=$last_Landing->id;
           $CloneBranch->branch_phone ="x";
           $CloneBranch->code    = $code;
            $CloneBranch->save();

            $branches_en = $request->input('address_en');
            $branches_ar = $request->input('address_ar');
            $branch_title_en=$request->input('cloneaddresstitle_en');
            $branch_title_ar=$request->input('cloneaddresstitle_ar');
            $branch_phone=$request->input('address_telephone');
        if($branches_en[0]!='')
        {
            for ($i=0; $i <count($branches_en) ; $i++)
            {
                $code= substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',2)),0,2);
       $digits = 5;
        $code.=rand(pow(10, $digits-1), pow(10, $digits)-1);
                $NewBranch = new LandingPage_branches;
                $NewBranch->branch_address_en=$branches_en[$i];
                $NewBranch->branch_address_ar=$branches_ar[$i];

                $NewBranch->branch_title_en=$branch_title_en[$i];
                $NewBranch->branch_title_ar=$branch_title_ar[$i];
                $NewBranch->landing_page_id=$last_Landing->id;
                $NewBranch->code=$code;
                if(count($request->input('address_telephone'))> $i)
                {

                    $NewBranch->branch_phone=$branch_phone[$i];

                }else{
                    $NewBranch->branch_phone=$last_Landing->business_phone;
                }

            $NewBranch->save();
            }
        }
        }

          $email1 = "contact@example.invalid" ;//
            $msg        = "
            <h1><img src='".url('/')."/public/img/logo3.png' /></h1>
                <h4>indooy congratulation </h4>

                  <p> finaly you have created your landing page you can see your <b>countdown </b> <a href='https://indooy.com/en/WebSite_Creation/yourTask/1/'" . $last_Landing->id ."> here </a>

            ";

                Mail::send('emails.new-page', ['customer_name' => $customer_name], function ($message) use ($email1){
                    $message->from($email1, 'congratulation !');
                    $message->to('contact@example.invalid')->subject('indooy | website_creation');
                });

            if(count(Mail::failures()) == 0){
$LandingID;
$task_link ="https://indooy.com/en/WebSite_Creation/yourTask/1/" .$LandingID;

        alert()->success('Landing page created', 'Successfully')
           ->footer('<a href=' . $task_link .'>go to your task to check your landing page</a>')

         ->showConfirmButton()
         ->showCloseButton();
 return redirect('/en/WebSite_Creation/yourTask/1/' . $last_Landing->id);
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

    }

}
}
public function landing_page_timer($lang,$type,$id)
{
    if($type==1)
    {
        // dd($id);
    $item=LandingPage::where('id','=',$id)->orderBy('id', 'desc')->first();
 }
 if($type==2)
    {
      $item=FullWebSite::where('id','=',$id)->orderBy('id', 'desc')->first();
    }
    // dd($item->updated_at);
    $timer = Carbon::parse($item->updated_at)->addMinutes(20);

    $now =Carbon::now();

    // dd($now);
    $bool =$timer->greaterThan($now);
    // dd($bool);
    if($item->statue!=0)
    {
        $timer=0;

    }else
    {
        $timer= $timer->diffInSeconds($now);
    }

     if($timer!=0)
     {
      return view('Web-site-Creation.page_coming_soon')->with('item',$item)->with('timer',$timer);
     }else{
        alert()->info('are you ready ? ','your request has been reviewed and now you can find your landing page in many ways like search ,recommendations, our ads system ,...etc')
         ->footer("you will go to your search result soon please don't close this pop-up message")
         ->showConfirmButton()
         ->showCloseButton();

        return view('Web-site-Creation.page_coming_soon')->with('item',$item)->with('timer',$timer);
     }
}
public function get_all_landing_page()
{
      $items=LandingPage::where('customer_id','=',Auth::guard('web_WebSite_Creation')->user()->id)->get();
    //  dd($items);
    return view('Web-site-Creation..all_landing_page')
            ->with('items',$items);

}
public function get_edit_landing_page( $prefx_lng,$LandingpageID)
{
     $Main_Item=LandingPage::join('countries','countries.id','landing_pages.country_list')->join('cities','cities.id','landing_pages.cities_list')->join('districts','districts.id','landing_pages.district_list')->select('*','landing_pages.id as LandingID')->where('landing_pages.id','=',$LandingpageID)->first();
     //dd($Main_Item);
     $statue=$Main_Item->statue;
     if($statue==0)
     {
$task_link ="https://indooy.com/en/WebSite_Creation/yourTask/1/" .$LandingpageID;

         alert()->info("previous request !", "we see that you have and old  request is in process , you can't edit your data before we finish your request .. thank you again!")

           ->footer('<a href=' . $task_link .'>go to your time down for more details </a><a href="https://indooy.com/en"> or looking for a something in indooy website </a>')

         ->showConfirmButton()
         ->showCloseButton();
            return redirect()->back();
     }
     $Sub_Item=LandingPage_branches::where('landing_page_id','=',$Main_Item->id)->get();
$country_list = DB::table('countries')->pluck('name','id');

$city_list = DB::table('cities')->where('country_id','=',$Main_Item->country_list)          ->pluck('name','id');

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
    $category_list=Activity::pluck('name_en','id');
    //  dd($Main_Item);
        return view('Web-site-Creation.edit-landing-page')
        ->with('category_list',$category_list)
        ->with('Main_Item',$Main_Item)
                ->with('country_list',$country_list)
        ->with('city_list',$city_list)
        ->with('district_list',$district_list)
        ->with('current_location',$current_location)
        ->with('Sub_Item',$Sub_Item);
}
public function edit_landing_page(Request $request)
{
   //dd($request->all());

    $messages = [
            'company_name_en.required'              => 'please write your company name in english',

            'company_name_ar.required'           => 'please write your company name in arabic',

            'business_email.required'             => 'please write your business email',

            'keyword_list_en.required'        => "write some keywords in english",
            'keyword_list_ar.required'        => "write some keywords in arabic",

            'country_list.required'        => "your country is  is a must",
            'cities_list.required'        => "your city is is a must",
            'district_list.required'        => "your district is is a must",

            'Main_address_en.required'        => "please write your Main address in english",
            'Main_address_ar.required'        => "please write your Main address in arabic",

            'business_phone.required'        => "product's Photo is is a must",

            'desc_en.required'        => "write some words in english to inform user who are you ",
            'desc_ar.required'        => "write some words in arabic to inform user who are you ",

            'company_logo.image'           => 'upload a Valid photo',
            'company_logo.required'           => 'upload a Valid photo',

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
        $update=LandingPage::find($request->input('ID'));
        $keywords_en=implode(',', $request->input('keyword_list_en'));
        $keywords_ar=implode(',', $request->input('keyword_list_ar'));
                $update->company_name_en         =$request->input('company_name_en');
        $update->company_name_ar         =$request->input('company_name_ar');
        $update->business_email          =$request->input('business_email');

        $update->category_list           =$request->input('category_list');
        $update->keyword_list_en            =$keywords_en;
        $update->keyword_list_ar            =$keywords_ar;

        $update->country_list            =$request->input('country_list');
        $update->cities_list             =$request->input('cities_list');
        $update->district_list           =$request->input('district_list');

$update->Main_address_en            =$request->input('Main_address_en');
$update->Main_address_ar            =$request->input('Main_address_ar');
        $update->business_phone          =$request->input('business_phone');

        $update->desc_en                 =$request->input('desc_en');
        $update->desc_ar                 =$request->input('desc_ar');
        if(!empty($company_logo)){
        $update->company_logo            =$request->input('company_logo');
    }
        $update->website_extra           =$request->input('website_extra');

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
                    // $branches_adress_en =$request->input('address_en');
                        ##############################
                    $update->statue =0;
                        ###############################
                    $branshes_phone =$request->input('address_telephone');

                    $company_logo = $request->file('company_logo');


        $update->facebookAcc             =$request->input('SocFacebook');
        $update->googleAcc              =$request->input('SocGoogle');
        $update->youtubeAcc               =$request->input('SocYoutube');
                    $branches_en = $request->input('address_en');
                    $branches_ar = $request->input('address_ar');
                    $branch_title_en=$request->input('cloneaddresstitle_en');
                    $branch_title_ar=$request->input('cloneaddresstitle_ar');
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

        if($update->save()){

            $current_branches=LandingPage_branches::where('landing_page_id','=',$request->input('ID'))->get();

            $defferance=count($branch_title_en)-count($branches_en);
          for($i=1;$i<count($branches_en);$i++)

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

                for ($i=count($current_branches); $i <=count($branch_title_en) ; $i++)
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
                  $email1 = "contact@example.invalid" ;//
            $msg        = "
            <h1><img src='".url('/')."/public/img/logo3.png' /></h1>
                <h4>indooy congratulation </h4>

                  <p> you have  request for update your landing page we will look for your request and replay you soon


            ";

                Mail::send('emails.send', ['msg' => $msg], function ($message) use ($email1){
                    $message->from($email1, 'congratulation !');
                    $message->to('contact@example.invalid')->subject('indooy | website_creation');
                });

            if(count(Mail::failures()) == 0){
$task_link ="https://indooy.com/en/WebSite_Creation/yourTask/1/" .$update->id;

        alert()->success('your request sent sccessfully ', 'Successfully')
        ->footer('<a href=' . $task_link .'>go to your time down for more details </a>')

         ->showConfirmButton()
         ->showCloseButton();
            return redirect('/en/WebSite_Creation');
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
    }
}
public function get_landing_page($lang='ar',$categoryname,
                                 $code,
                                 $company_name
                                )
{

   $item =LandingPage_branches::join('landing_pages','landing_pages.id','landing_page_branches.landing_page_id')
    ->Where('landing_page_branches.code', '=',$code)
    ->select('*','landing_pages.id as me_id')->first();

//      dd($results);
        $LandingID=$item->me_id;
$MainCode=LandingPage_branches::where('landing_page_id','=',$LandingID)->select('code')->first();
        $MainCode=$MainCode->code;

$branches_items=LandingPage_branches::where('landing_page_id','=',$LandingID)->get();
        if (Config::get('app.locale')=='en')
        {
          $item->name_ar=$item->name_en;
          $item->company_name_ar=$item->company_name_en;
          $item->Main_address_ar=$item->Main_address_en;
          $item->desc_ar=$item->desc_en;
          $item->branch_title_ar=$item->branch_title_en;
          $item->branch_address_ar=$item->branch_address_en;
                foreach ($branches_items as $itemx)
                 {
                   $itemx->branch_title_ar=$itemx->branch_title_en;
                   $itemx->branch_address_ar=$itemx->branch_address_en;

                 }
        }
        // dd($item);



//$branches_items->merge($item);
// $array = array_merge($item->toArray(), $branches_items->toArray());
//   dd($array);
// dd($branches_items);
    return view ('Web-site-Creation.LandingPage.company.index')
    ->with('item',$item)
    ->with('branches_items',$branches_items)->with('categoryname',$categoryname)->with('MainCode',$MainCode);
}
public function inquiry(Request $request)
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
$NewInquiry=new Inquiry;
$NewInquiry->fullname=$request->input('fullname');
$NewInquiry->mobile=$request->input('mobile');
$NewInquiry->email=$request->input('email');
$NewInquiry->msg=$request->input('msg');
$NewInquiry->landing_code=$request->input('codePage');
$NewInquiry->userIP=$ip;
   if($NewInquiry->save())
   {
    $email=LandingPage::join('landing_page_branches','landing_pages.id','landing_page_branches.landing_page_id')->where('landing_page_branches.code','=',3)->select('landing_pages.business_email')->first();
    // dd($email);

    // dd('well');
   //$to_email=$email->business_email;
$to_email="contact@example.invalid";
     $email1="contact@example.invalid";
     $fullname=$request->input('fullname');
     $email=$request->input('email');
     $mobile=$request->input('mobile');
     $msg=$request->input('msg');
 Mail::send('emails.inquiry', [
            'fullname' => $fullname,
            'email' => $email,
            'mobile' => $mobile,
            'msg' => $msg
], function ($message) use ($email1,$to_email){
                 $message->from($email1, 'inquiry !');
                 $message->to($to_email)->subject('indooy | landing page inquiry');
             });
 if(count(Mail::failures()) == 0){

            return redirect()->back();
        }else{

     alert()->error('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

 }


}
public function get_all_edit_Admin()
{
  $items=LandingPage::select('id','company_name_en','company_name_ar','business_email','business_phone','company_logo','created_at')->get();
  return view('Admin.LANDING.get_all_landing')->with('items',$items);
}
public function get_edit_Admin($LandingID)
{

return app('App\Http\Controllers\RequestsController')->get_request("ADMIN_EDIT",$LandingID);

}
}

