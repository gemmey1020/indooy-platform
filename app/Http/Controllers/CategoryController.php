<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programmes;
use App\SubProgrammes;
use Session;
use Image;
use Validator;
use DB;
class CategoryController extends Controller
{
    public function show_all_MainCat()
    {
      $MainCats=Programmes::get();

      return view('Admin.All_Main_Cat')->with('MainCats',$MainCats);
    }
    public function get_edit_MainCat($MainCat_ID)
    {
      $item=Programmes::find($MainCat_ID);

      return view('Admin.Edit_MainCat')->with('item',$item);
    }
    public function edit_MainCat($MainCat_ID,Request $request)
    {
      $update = Programmes::find($MainCat_ID);
      $update->MainCat_name=$request->input('MainCat_name');
      if ($update->save()) {
               notify()->flash($update->MainCat_name . " Edited successfully", 'success');
                return redirect()->back();
                 }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

    }
    public function Get_Add_SubCat()
    {
        $MainCats=Programmes::pluck('MainCat_name','id');
        return view('Admin.Add_sub_cat')->with('MainCats',$MainCats);
    }
    public function Add_SubCat(Request $request)
    {
        //dd($request->all());
         $messages = [
            'MainCat_ID.required'          => 'please chhose the main Program',

            'SubCat_Name.required'         => 'please write the category name ',

            'SubCat_PicExect.required'     => 'your Photo',

            'SubCat_PicExect.image'        => 'upload a Valid photo',
        ];
         $validatedData = Validator::make($request->all(),[
        'SubCat_Name'    => 'required|unique:sub_programmes|max:255',
        'MainCat_ID'     => 'required',

        'SubCat_PicExect'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
            $New_SubCat = new SubProgrammes;

            $New_SubCat->MainCat_ID      =$request->input('MainCat_ID');
            $New_SubCat->SubCat_Name     =$request->input('SubCat_Name');
            $New_SubCat->Description     =$request->input('Desc');

            $photo = $request->file('SubCat_PicExect');
            if(!empty($photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/SubCat/';

              $thumb           = Image::make($photo)
                                    ->resize(374, 241)->save($path.$photo_fullname);
              $New_SubCat->pic_exct    = $photo_fullname;
            }
            if($New_SubCat->save()){
               notify()->flash($New_SubCat->SubCat_Name . " Added successfully", 'success');
                return redirect()->back();
                 }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
}
    public function show_all_SubCat()
    {
        $SubCats=
        SubProgrammes::join('programmes','programmes.id','sub_programmes.MainCat_ID')
        ->leftJoin('products','sub_programmes.id','products.SubCat_ID')
        ->select('sub_programmes.*','programmes.MainCat_name',DB::raw('count(*) as num_products'))
        ->groupBy('sub_programmes.SubCat_name')
        ->get();

        return view('Admin.All_Sub_Cat')->with('SubCats',$SubCats);
    }
    public function get_edit_SubCat($SubCat_ID)
    {
        $MainCats=Programmes::pluck('MainCat_name','id');
        $SubCats=SubProgrammes::find($SubCat_ID);
        /* $SubCats=
        $SubCats::leftJoin('programmes','programmes.id','sub_programmes.MainCat_ID')

        ->select('sub_programmes.*','sub_programmes.id as SubCatID','programmes.MainCat_name')
        ->first();
        */
        $MainCat_name=Programmes::where('id',$SubCats->MainCat_ID)->pluck('id','MainCat_name');

//dd($SubCat_ID);
        return view('Admin.Edit_SubCat')
             ->with('MainCats',$MainCats)
             ->with('MainCat_name',$MainCat_name)
             ->with('SubCats',$SubCats);

    }
    public function edit_SubCat($SubCat_ID,Request $request)
    {

        $messages = [
            'MainCat_ID.required'          => 'please chhose the main Program',




            'SubCat_PicExect.image'        => 'upload a Valid photo',
        ];
         $validatedData = Validator::make($request->all(),[
        'SubCat_Name'    => 'required',
        'MainCat_ID'     => 'required',

        'SubCat_PicExect'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:3048',
],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
            $currrent_subCat = SubProgrammes::find($SubCat_ID);

            $currrent_subCat->MainCat_ID      =$request->input('MainCat_ID');
            $currrent_subCat->SubCat_Name     =$request->input('SubCat_Name');
            $currrent_subCat->Description     =$request->input('Desc');

            $photo = $request->file('SubCat_PicExect');
            if(!empty($photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/SubCat/';

              $thumb           = Image::make($photo)
                                    ->resize(374, 241)->save($path.$photo_fullname);
              $currrent_subCat->pic_exct    = $photo_fullname;
            }
            if($currrent_subCat->save()){
               notify()->flash($currrent_subCat->SubCat_Name . " updated successfully", 'surccess');
                return redirect()->back();
                 }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }

    }
    public function delete_SubCat($SubCat_ID)
    {
        $delete= SubProgrammes::find($SubCat_ID);
        $path            = public_path().'/photos/SubCat/'.$delete->pic_exct;
        if(file_exists($path) && $delete->delete()){
            unlink($path);
            notify()->flash('category { '.  $delete->SubCat_name .' } deleted successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }

}
