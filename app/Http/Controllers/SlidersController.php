<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sliders;
use Session;
use Image;
use Validator;

class SlidersController extends Controller
{
    public function get_Add_slider_top()
    {
    	return view('Admin.Add_sliders_top');
    }
    public function Add_slider_top(Request $request)
    {
    	$NewSlider= new Sliders;
    	 $photo = $request->file('PicExect1');
            if(!empty($photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/sliders/';

              $thumb           = Image::make($photo)
                                    ->resize(1920, 484)->save($path.$photo_fullname);
              $NewSlider->pic_exct    = $photo_fullname;
              $NewSlider->pos=1;
              if($NewSlider->save()){
		notify()->flash('Slider added successfully', 'success');
            return redirect()->back();
        }else{

     	notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
         }
    }
    public function All_slider_top()
    {
    	$sliders = Sliders::where('pos',1)->get();
    	return view('Admin.All_Sliders_top')->with('sliders',$sliders);
    }


	public function get_Add_slider_down()
    {
    	return view('Admin.Add_sliders_down');
    }
    public function Add_slider_down(Request $request)
    {
    	$NewSlider= new Sliders;
    	 $photo = $request->file('PicExect1');
            if(!empty($photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/sliders/';

              $thumb           = Image::make($photo)
                                    ->resize(214, 143)->save($path.$photo_fullname);
              $NewSlider->pic_exct    = $photo_fullname;
              $NewSlider->pos=2;
              if($NewSlider->save()){
		notify()->flash('Slider added successfully', 'success');
            return redirect()->back();
        }else{

     	notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
         }
    }
    public function All_slider_down()
    {
    	$sliders = Sliders::where('pos',2)->get();
    	return view('Admin.All_Sliders_down')->with('sliders',$sliders);
    }
    public function delete_slider($SliderID)
    {
    	$delete =Sliders::find($SliderID);

        $path            = public_path().'/photos/sliders/'.$delete->pic_exct;
        if(file_exists($path) && $delete->delete()){
            unlink($path);
            notify()->flash('slider deleted successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }





}
