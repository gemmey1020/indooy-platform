<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use Session;
use Image;
use Validator;
use auth;
class ActivityController extends Controller
{
     public function get_add_activity()
   {
    return view('Admin.Add_activity');
   }
      public function add_activity(Request $request)
   {
    $messages = [
            'name_ar.required'              => 'enter activity in arabic ',

            'keywords_ar.required'           => 'enter keywords in arabic ',

            'Desc_ar.required'           => 'enter Description in arabic ',

            'name_en.required'              => 'enter activity in english',

            'keywords_en.required'           => 'enter keywords in english ',

            'Desc_en.required'           => 'enter Description in english ',

            'activity_pic.required'        => "product's Photo is amust",

            'activity_pic.image'           => 'upload a Valid photo',

        ];
         $validatedData = Validator::make($request->all(),[
        'name_ar'    => 'required|unique:activities|max:255',
        'name_en'    => 'required|unique:activities|max:255',
        'keywords_ar'      => 'required',
        'keywords_en'      => 'required',
        'Desc_ar'          => 'required',
        'Desc_en'          => 'required',
        'activity_pic'     => 'required',



],$messages);

         if ($validatedData->fails()) {
          notify()->flash(' you should fill all fields .. ', 'warning');
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
    $new_activity = new Activity;
    $new_activity->name_ar                 =$request->input('name_ar');
    $new_activity->name_en                 =$request->input('name_en');
    $new_activity->keywords_ar             =$request->input('keywords_ar');
    $new_activity->keywords_en             =$request->input('keywords_en');
    $new_activity->Desc_ar                 =$request->input('Desc_ar');
    $new_activity->Desc_en                 =$request->input('Desc_en');


    $activity_pic = $request->file('activity_pic');
            if(!empty($activity_pic)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $activity_pic->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/activity/';

              $thumb           = Image::make($activity_pic)
                                ->save($path.$photo_fullname);
              $new_activity->pic_exct    = $photo_fullname;
            }

    if($new_activity->save())
    {
        notify()->flash('Activity added successfully', 'success');
            return redirect()->back();
        }else{

        notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
          }
  }
  public function all_activites()
  {
    $activity=Activity::all();
    // $text=$activity[1]['keywords_ar'];
    // $text = explode("-", $text);
    // //dd($text);
    // $text = implode("<p>", $text);
    // echo($text);
    //echo str_replace("-","<p>",$activity[1]['keywords_ar']);
     // echo($text);
    return view('Admin.All_activities')->with('activity',$activity);
  }

 public function get_edit_activity($ActivityID)
    {
        $item=Activity::find($ActivityID);
        return view('Admin.edit_activity')->with('item',$item);
    }
    public function edit_activity($ActivityID,Request $request)
    {
      $item=Activity::find($ActivityID);
      $item_ar=$item->name_ar;
      $item_en=$item->name_en;
       $messages = [
            'name_ar.required'              => 'enter activity in arabic ',

            'keywords_ar.required'           => 'enter keywords in arabic ',
             'Desc_ar.required'              => 'enter keywords in arabic',

            'name_en.required'              => 'enter activity in english',

            'keywords_en.required'           => 'enter keywords in english ',
            'Desc_ar.required'               => 'enter Description in english',

        ];
        if($request->input('name_ar')!=$item_ar && $request->input('name_en')!=$item_en)
        {
         $validatedData = Validator::make($request->all(),[

         'name_ar'    => 'required|unique:activities|max:255',
         'name_en'    => 'required|unique:activities|max:255',
         'keywords_ar'      => 'required',
         'keywords_en'      => 'required',
         'Desc_ar'          => 'required',
         'Desc_en'          => 'required',
        ],$messages);
        }else{
          $validatedData = Validator::make($request->all(),[

        'name_ar'    => 'required|max:255',
        'name_en'    => 'required|max:255',
        'keywords_ar'      => 'required',
        'keywords_en'      => 'required',
         'Desc_ar'          => 'required',
         'Desc_en'          => 'required',

        ],$messages);
}
         if ($validatedData->fails()) {
          notify()->flash(' you should fill all fields .. ', 'warning');
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
        $update =Activity::find($ActivityID);

    $update->name_ar                 =$request->input('name_ar');
    $update->name_en                 =$request->input('name_en');
    $update->keywords_ar             =$request->input('keywords_ar');
    $update->keywords_en             =$request->input('keywords_en');
    $update->Desc_ar                 =$request->input('Desc_ar');
    $update->Desc_en                 =$request->input('Desc_en');
        $activity_pic = $request->file('activity_pic');
            if(!empty($activity_pic)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $activity_pic->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/activity/';

              $thumb           = Image::make($activity_pic)
                                ->save($path.$photo_fullname);
              $update->pic_exct    = $photo_fullname;
            }
        if($update->save()){
            notify()->flash('Activity { '.  $update->name_ar .' } updated successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
 }

  public function delete_activity($ActivityID)
  {
       $delete=Activity::find($ActivityID);

        if($delete->delete()){
            notify()->flash('activity deleted successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
  }
  public function get_Rel_activity()
  {
    $Name_Ar=Activity::pluck('name_ar','id');
    return view('Admin.related_activity')->with('Name_Ar',$Name_Ar);
  }
  public function RelatedNameEn_Ajax($id)
    {
      $name_en =Activity::where("id",$id)
                          ->pluck("name_en","id");
      $result2=Activity::select('Relatedkeywords_ar','Relatedkeywords_en')->where('id',$id)->first();
      $Relatedkeywords_ar=$result2->Relatedkeywords_ar;
      $Relatedkeywords_en=$result2->Relatedkeywords_en;

      $result = array(
         "name_en"            => $name_en,
         "Relatedkeywords_ar" =>$Relatedkeywords_ar,
         "Relatedkeywords_en" =>$Relatedkeywords_en
// str_replace("-","</p>",$Relatedkeywords_ar),
      );

        return json_encode($result);
    }
    public function Rel_activity(Request $request)
    {
      $id=$request->input('name_ar');

      $update = Activity::find($id);
      $update->Relatedkeywords_ar=$request->input('Relatedkeywords_ar');
      $update->Relatedkeywords_en=$request->input('Relatedkeywords_en');

       if($update->save()){
            notify()->flash('Activity { '.  $update->name_ar .' } updated successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }
    }
    public function all_Rel_activites()
    {
      $result=Activity::select('pic_exct','name_ar','name_en','Relatedkeywords_ar','Relatedkeywords_en','created_at','updated_at')->get();
      return view('Admin.All_related')->with('result',$result);
    }
    public function get_all_in_one()
    {
      return view('Admin.all_in_one');
    }
     public function add_all_in_one(Request $request)
    {

       $english_name=array_map('trim',array_filter(explode('<br />',$request->input('name_en'))));
       $arabic_name =array_map('trim',array_filter(explode('<br />',$request->input('name_ar'))));

      #############
      #############
   //   echo "<pre>";
   //    print_R($english_name);
   //    echo "</pre>";

   // echo "<pre>";
   //    dd($arabic_name);
      // echo "</pre>";
      for ($i=1; $i <=count($english_name) ; $i++) {

              $z = new Activity;
              $z->name_ar=$arabic_name[$i];
              $z->name_en=$english_name[$i];
              $z->save();
              if($i==count($english_name))
              {
                echo "done";
              }
        //echo (str_replace(" ","</p>",$arabic_name[$i]));
            }

  }

    function clone_activity()
  {
    ini_set('max_execution_time', 300);
    for($i=10;$i<=695;$i++)
    {
    $data = Activity::find($i);

      $data->keywords_ar .=',' . $data->name_ar . ',';
      $data->keywords_en .=',' . $data->name_en . ',';

    $data->save();
  }


  }
}
