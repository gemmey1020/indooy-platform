<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
use App\LandingPage;
use App\WebSiteCreation;
use App\Full_website_creation;
use App\LandingPage_branches;
use App\Activity;
use Config;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class SearchController extends Controller
{
    public function search( Request $query_request)
    {
        /*

                        require_once "/usr/local/cpanel/php/cpanel.php";
        // Connect to cPanel - only do this once.
$cpanel = new CPANEL();

// Get domain user data.
$get_userdata = $cpanel->uapi(
    'DomainInfo', 'domains_data',
    array(
        'format'    => 'hash',
    )
    );

dd($get_userdata);





        */

        // dd($query_search->key);
        //Store the micro time so that we know
//when our script started to run.
// $executionStartTime = microtime(true);

// //Example code.
// $pdo->query("SELECT id FROM users WHERE email_verified = 0");

// //At the end of your code, compare the current
// //microtime to the microtime that we stored
// //at the beginning of the script.
// $executionEndTime = microtime(true);

// //The result will be in seconds and milliseconds.
// $seconds = $executionEndTime - $executionStartTime;

// //Print it out
// echo "This script took $seconds to execute.";

        $query_search=$query_request->q;
        $query_type=$query_request->type;
        $executionStartTime = microtime(true);


$result1 =Activity::Join('landing_pages','activities.id','landing_pages.category_list')
              ->join('landing_page_branches','landing_pages.id','landing_page_branches.landing_page_id')

->where('landing_pages.company_name_en', 'LIKE', '%'.$query_search.'%')
        ->orWhere('landing_pages.company_name_ar', 'LIKE', '%'.$query_search.'%')

        ->orWhere('activities.name_ar', 'LIKE', '%'.$query_search.'%')
        ->orWhere('activities.name_en', 'LIKE', '%'.$query_search.'%')
        ->orWhere('activities.keywords_ar', 'LIKE', '%'.$query_search.'%')
        ->orWhere('activities.keywords_en', 'LIKE', '%'.$query_search.'%')

        ->orWhere('landing_pages.desc_en', 'LIKE', '%'.$query_search.'%')
        ->orWhere('landing_pages.desc_ar', 'LIKE', '%'.$query_search.'%')
        ->orWhere('landing_pages.category_list', 'LIKE', '%'.$query_search.'%')
        ->orWhere('landing_pages.keyword_list_en', 'LIKE', '%'.$query_search.'%')
        ->orWhere('landing_pages.keyword_list_ar', 'LIKE', '%'.$query_search.'%')

        ->orWhere('landing_pages.business_phone', '=', $query_search)
        ->orWhere('landing_pages.Main_address_en', 'LIKE', '%'.$query_search.'%')
        ->orWhere('landing_pages.Main_address_ar', 'LIKE', '%'.$query_search.'%')
        ->orWhere('landing_page_branches.branch_title_en', 'LIKE', '%'.$query_search.'%')
->orWhere('landing_page_branches.branch_address_ar', 'LIKE', '%'.$query_search.'%')
->orWhere('landing_page_branches.branch_title_ar', 'LIKE', '%'.$query_search.'%')
->orWhere('landing_page_branches.branch_phone', 'LIKE', '%'.$query_search.'%');

$result2=Activity::Join('full_web_sites','activities.id','full_web_sites.category_list')

              ->join('full_web_site_branches','full_web_sites.id','full_web_site_branches.Full_WebSite_id')

->where('full_web_sites.company_name_en', 'LIKE', '%'.$query_search.'%')
        ->orWhere('full_web_sites.company_name_ar', 'LIKE', '%'.$query_search.'%')

        ->orWhere('activities.name_ar', 'LIKE', '%'.$query_search.'%')
        ->orWhere('activities.name_en', 'LIKE', '%'.$query_search.'%')
        ->orWhere('activities.keywords_ar', 'LIKE', '%'.$query_search.'%')
        ->orWhere('activities.keywords_en', 'LIKE', '%'.$query_search.'%')

        ->orWhere('full_web_sites.category_list', 'LIKE', '%'.$query_search.'%')
        ->orWhere('full_web_sites.keyword_list_en', 'LIKE', '%'.$query_search.'%')
        ->orWhere('full_web_sites.keyword_list_ar', 'LIKE', '%'.$query_search.'%')
        ->orWhere('full_web_site_branches.branch_title_en', 'LIKE', '%'.$query_search.'%')
->orWhere('full_web_site_branches.branch_address_ar', 'LIKE', '%'.$query_search.'%')
->orWhere('full_web_site_branches.branch_title_ar', 'LIKE', '%'.$query_search.'%')
->orWhere('full_web_site_branches.branch_phone', 'LIKE', '%'.$query_search.'%');
$result1=$result1->where('landing_pages.statue','!=','0')->paginate(8);
$result2=$result2->where('full_web_sites.company_name_ar','!=','صن_كابيتال')->paginate(8);
$all_result = array_merge($result1->items(),$result2->items());
$all=collect($all_result)->unique();
$total =$result1->total()+$result2->total();

$currentPage=LengthAwarePaginator::resolveCurrentPage();
$count=count($all_result)==0 ? 1 : count($all_result);
$results=new LengthAwarePaginator($all_result,$count,$currentPage);
 // dd($results);
// $result1->paginate(8);
if (Config::get('app.locale')=='en') {

    foreach ($results as $item)
    {
           $item->name_ar=$item->name_en;
          $item->company_name_ar=$item->company_name_en;
          $item->Main_address_ar=$item->Main_address_en;
          $item->desc_ar=$item->desc_en;
          $item->branch_title_ar=$item->branch_title_en;
          $item->branch_address_ar=$item->branch_address_en;
    }
}

        $executionEndTime = microtime(true);
         $executionTime = $executionEndTime - $executionStartTime;
         $executionTime=round($executionTime, 2);

         return view ('site.SearchResult')
         ->with('executionTime',$executionTime)
         ->with('results',$results)
         ->with('query_search',$query_search)
         ->with('query_type',$query_type)
         ->with('total',$total);
    }
    public function AutoComplete_AJAX(Request $request){
    $term = Input::get('term');

    $results = array();
    $result1 = array();

    $queries = DB::table('activities')
        ->where('keywords_ar', 'LIKE', '%'.$term.'%')
        ->orWhere('keywords_en', 'LIKE', '%'.$term.'%')
        ->take(10)->get();
        if(count($queries)>0)
        {
    $result1[]= [ 'id' => 0,
         'value' => $term ];
     }
     // }else{
     //     $result1[]= [ 'id' => 0,
     //     'value' => ''];
     // }
    foreach ($queries as $query)
    {

        $results[] = [ 'id' => $query->id,
         'value' => strtolower($query->name_ar)];
    }

    $results=array_merge($result1,$results);
return Response::json($results);
}
}
