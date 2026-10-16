<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PetroCare;
use Validator;
use Session;
use Image;
class PetrocareController extends Controller
{
	public function Get_Add_service()
	{
		return view('Admin.Add_petrocare');
	}
    public function Add_service(Request $request)
    {
    	$messages = [

	    'name.required'           => 'please write the service name ',
	    'name.unique'			  => 'You have this service already',

	    'Title_Desc.required'             => 'please write the some word  in description ',
	    'Full_Desc.required'              =>'please write the some word  in description ',

	    'pic_exct.required'        => "product's Photo is amust",

	    'pic_exct.image'           => 'upload a Valid photo',
        ];
         $validatedData = Validator::make($request->all(),[
        'name'    => 'required|unique:petro_cares|max:255',

        'Title_Desc'     => 'required',
        'Full_Desc'     =>  'required',
        'pic_exct'     => 'required',


],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
        $NewService = new PetroCare;
        $NewService->name      =$request->input('name');
        $NewService->title        =$request->input('Title_Desc');
        $NewService->Desc         =$request->input('Full_Desc');

        $photo = $request->file('pic_exct');
            if(!empty($photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/petrocares/';

              $thumb           = Image::make($photo)
                                    ->resize(558, 231)->save($path.$photo_fullname);
              $NewService->pic_exct    = $photo_fullname;
            }

            if($NewService->save()){
        notify()->flash('service { ' . $NewService->name . ' } added successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

    }

}
    public function Show_All_service()
    {
    	$all_services= PetroCare::get();
    	return view('Admin.All_services')->with('all_services',$all_services);
    }
    public function showOnSite()
    {
    	$all_services= PetroCare::get();
    	return view('site.petrocare')->with('all_services',$all_services);
    }
    public function showOnSite_details($ServiceID)
    {
      $item=PetroCare::find($ServiceID);
      return view('site.petrocare_details')->with('item',$item);
    }
	public function get_edit_service($ServiceID)
	{
		$service=PetroCare::find($ServiceID);
		return view('Admin.edit_service')->with('service',$service);
	}
	public function edit_service($ServiceID,Request $request)
	{

		$messages = [

	    'name.required'           => 'please write the service name ',
	    'name.unique'			  => 'You have this service already',

	    'Title_Desc.required'             => 'please write the some word  in description ',
	    'Full_Desc.required'              =>'please write the some word  in description ',



	    'pic_exct.image'           => 'upload a Valid photo',
        ];
         $validatedData = Validator::make($request->all(),[
        'name'    => 'required|max:255',

        'Title_Desc'     => 'required',
        'Full_Desc'     =>  'required',

],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
       $update_service=PetroCare::find($ServiceID);
        $update_service->name         =$request->input('name');
        $update_service->title        =$request->input('Title_Desc');
        $update_service->Desc         =$request->input('Full_Desc');

        $photo = $request->file('pic_exct');
            if(!empty($photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/petrocares/';

              $thumb           = Image::make($photo)
                                    ->resize(558, 231)->save($path.$photo_fullname);
              $update_service->pic_exct    = $photo_fullname;
            }

            if($update_service->save()){
        notify()->flash('service { ' . $update_service->name . ' } added successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

    }
}
	public function delete_service($ServiceID)
	{
          $delete= PetroCare::find($ServiceID);
          if(!empty ($delete->pic_exct) ){
        $path_photo    = public_path().'/photos/petrocares/'.$delete->pic_exct;
           if(file_exists($path_photo)){
        unlink($path_photo);
      }
    }


    if( $delete->delete()){

 		notify()->flash('service { '.  $delete->name .' } deleted successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'error');
                return redirect()->back();
            }

}
}
