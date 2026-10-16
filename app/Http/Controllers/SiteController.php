<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programmes;
use App\SubProgrammes;
use App\Sliders;
use App\Activity;
use App\FullWebSite;
use App\LandingPage;
use App\MapLocation;
use Session;
use Image;
use Validator;
use DB;

class SiteController extends Controller
{
    public function index()
    {
    	$MainCat=
        Programmes::select('id','MainCat_name')->get();

    	 $SubCats=
        SubProgrammes::join('programmes','programmes.id','sub_programmes.MainCat_ID')
        ->select('sub_programmes.*','programmes.MainCat_name')
        ->get();
         $top_sliders =
        Sliders::where('pos',1)->select('pic_exct')->get();

         $down_sliders =
        Sliders::where('pos',2)->select('pic_exct')->get();
        //dd($down_sliders[0]['pic_exct']);
        //dd(ceil(9/4));
        //dd(ceil(count($down_sliders)/4));
    	return view('site.index')
    	->with('MainCat',$MainCat)
    	->with('SubCats',$SubCats)
        ->with('top_sliders',$top_sliders)
        ->with('down_sliders',$down_sliders);
    }
    public function get_maps()
    {
    //  $locations=FullWebSite::select('id','company_name_en','company_name_ar','map_lat','map_lng')->get();
     ############################
     ###########################

    $result1 =MapLocation::Join('landing_pages','locations.related_id','landing_pages.id')->where('type',1)->select('landing_pages.id as MainID','company_name_en','company_name_ar','locations.id as LocationID','locations.map_lat','locations.map_lng')->paginate(6)
;
$result2=MapLocation::Join('full_web_sites','locations.related_id','full_web_sites.id')->where('type',2)->select('full_web_sites.id as MainID','company_name_en','company_name_ar','locations.id as LocationID','locations.map_lat','locations.map_lng')->paginate(6);
$all_result = array_merge($result1->items(),$result2->items());
$locations=collect($all_result)->unique();


// $locations= MapLocation::leftJoin('landing_pages','locations.related_id','landing_pages.id')->where('locations.type',1)->leftJoin('full_web_sites','locations.related_id','full_web_sites.id')->where('locations.type',2)->get();


     ###########################
     ########################
//   dd($locations);
    return view('site.all_maps')->with('locations',$locations);
    }
}
