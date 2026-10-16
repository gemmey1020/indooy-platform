<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesManagers;
use App\Sales;
use App\Location;
class SalesManagersController extends Controller
{
    public function ShowAll()
    {
    	$all_mangers= SalesManagers::get();

    	return view('Admin.All_SalesManagers')->with('all_mangers',$all_mangers);
    }
    public function DeleteManager($ManagerID)
    {
    	$delete=SalesManagers::find($ManagerID);
    	if($delete->delete()){
            notify()->flash('SalesManager { '.  $delete->name .' } deleted successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
    public function get_edit_sales($SalesID)
    {
        $sales=Sales::find($SalesID);
        return view('SalesManagers.edit_sales')
               ->with('sales',$sales);
    }
    public function edit_sales($SalesID,Request $request)
    {
        $update =Sales::find($SalesID);
        $name   =   $request->input('name');
        $email = $request->input('email');
        if(!empty($request->input('password')))
        {
            $password = bcrypt($request->input('password'));
            $update->password   =$password;
        }
        $update->name = $name;
        $update->email      =$email;

        if($update->save()){
            notify()->flash('sales { '.  $update->name .' } updated successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
    public function get_edit_M($SalesManagerID)
    {
        $item=SalesManagers::find($SalesManagerID);
        return view('Admin.edit_SalesManagers')->with('item',$item);
    }
    public function edit_M($SalesManagerID,Request $request)
    {
        $update =SalesManagers::find($SalesManagerID);
        $name   =   $request->input('name');
        $email = $request->input('email');
        if(!empty($request->input('password')))
        {
            $password = bcrypt($request->input('password'));
            $update->password   =$password;
        }
        $update->name       = $name;
        $update->email      =$email;

        if($update->save()){
            notify()->flash('SalesManager { '.  $update->name .' } updated successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
    public function DeleteLocation($LocationID)
    {
        $delete=Location::find($LocationID);

        if($delete->delete()){
            notify()->flash('location  deleted successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
}
