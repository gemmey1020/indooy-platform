<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
class SalesController extends Controller
{
    public function ShowAll()
    {
    	$all_Sales= Sales::get();

    	return view('SalesManagers.All_Sales')->with('all_Sales',$all_Sales);
    }
    public function DeleteSales($SalesID)
    {
    	$delete=Sales::find($SalesID);
    	if($delete->delete()){
            notify()->flash('Sales { '.  $delete->name .' } deleted successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
}
