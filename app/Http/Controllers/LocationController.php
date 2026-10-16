<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use auth;
use Illuminate\Support\Facades\DB;
class LocationController extends Controller
{
   public function get_add_for_sales()
   {
    return view('Sales.Add_map');
   }
   public function add_for_sales(Request $request)
   {
    $new_location = new Location;
    $new_location->lat                    =$request->input('map_lat');
    $new_location->lng                    =$request->input('map_lng');
    $new_location->statue                 =$request->input('location_staue');
    $new_location->company_name           =$request->input('company_name');
    $new_location->company_num            =$request->input('company_num');
    $new_location->company_email          =$request->input('company_email');
    $new_location->note                   =$request->input('note');
    $new_location->sales_id               =Auth::guard('web_Sales')->user()->id;
    if($new_location->save())
    {
        notify()->flash('Location added successfully', 'success');
            return redirect()->back();
        }else{

        notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
  }
  public function all_map_sales()
  {
    $locations  = Location::join('sales','sales.id','locations.sales_id')
                     ->select('locations.*','sales.name')
                     ->where('locations.sales_id',Auth::guard('web_Sales')->user()->id)
                     ->get();

    return view('Sales.All_Locations')->with('locations',$locations);
  }
  public function get_edit_for_sales($LocationID)
  {
    $current  = Location::find($LocationID);
    //dd($current);
            return view('Sales.Edit_Location')->with('current',$current);
  }
  public function edit_for_sales($LocationID, Request $request)
  {
    $current= Location::find($LocationID);
    $current->lat                    =$request->input('map_lat');
    $current->lng                    =$request->input('map_lng');
    $current->statue                 =$request->input('location_staue');
    $current->company_name           =$request->input('company_name');
    $current->company_num            =$request->input('company_num');
    $current->company_email          =$request->input('company_email');
    $current->note                   =$request->input('note');
    $current->sales_id       =Auth::guard('web_Sales')->user()->id;
    if($current->save())
    {
        notify()->flash('Location added successfully', 'success');
            return redirect()->back();
        }else{

        notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
  }
  public function get_all_distrub()
  {
    $locations  = Location::join('sales','sales.id','locations.sales_id')
                     ->select('locations.*','sales.name')->where('sales.salesM_id',Auth::guard('web_SalesManagers')->user()->id)->get();
            return view('SalesManagers.All_map')->with('locations',$locations)->with('qwe',true);;
  }
    public function get_all_distrub_Admin()
  {
    $locations  = Location::join('sales','sales.id','locations.sales_id')
                     ->select('locations.*','sales.name')->get();
            return view('SalesManagers.All_map')->with('locations',$locations);
  }
  public function get_report_table($LocationID)
  {
    $current= Location::join('sales','sales.id','locations.sales_id')
                     ->where('locations.id',$LocationID)
                     ->select('locations.*','sales.name')
                     ->first();
                    // dd($current);
            return view('SalesManagers.location_report')->with('current',$current);
  }
    public function get_report_table_Admin($LocationID)
  {
    $current= Location::join('sales','sales.id','locations.sales_id')
                     ->where('locations.id',$LocationID)
                     ->select('locations.*','sales.name')
                     ->first();
                    // dd($current);
    $salesM_name =  Location::join('sales','sales.id','locations.sales_id')
    ->join('sales_managers','sales_managers.id','sales.salesM_id')
    ->where('locations.id',$LocationID)
    ->select('sales_managers.name')->first();

            return view('SalesManagers.location_report')->with('current',$current)->with('salesM_name',$salesM_name);
  }
 public function get_cities(Request $request){
    $cities = DB::table('cities')->where('country_id','=',$request->input('countryId'))->select('id','name')->get();
    return response()->json($cities);
  }
  public function get_districts(Request $request){
    if ($request->has('countryId'))
    {
      $districts = DB::table('districts')
      ->where('city_id','=',$request->input('cityId'))
      ->where('country_id','=',$request->input('countryId'))
      ->select('id','name')->get();
    }else{
    $districts = DB::table('districts')->where('city_id','=',$request->input('cityId'))->select('id','name')->get();
  }
    return response()->json($districts);
  }


  static function cities(){
    $cities = DB::table('cities')->where('country_id','=',4)->pluck('city_name','city_id');
    return $cities;
}
public function test(Request $req)
{
  dd($req);
}
}
