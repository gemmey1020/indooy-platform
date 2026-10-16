<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programmes;
use App\SubProgrammes;
use App\ProductsPhoto;
use App\products_videos;
use App\Product;
use App\Sliders;

use Session;
use Image;
use Validator;
use DB;
class ProductController extends Controller
{
  # user Section
  public function ShowAll_All()
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

    return view('site.products_show')
         ->with('MainCat',$MainCat)
         ->with('SubCats',$SubCats)
         ->with('top_sliders',$top_sliders)
         ->with('down_sliders',$down_sliders);
  }


    public function ShowAll_for_cat($CatName)
    {
      $Cat = SubProgrammes::where('SubCat_name',$CatName)->first();
      $catID = $Cat->id;
      $products=Product::where('SubCat_ID',$catID)->paginate(9);
      $down_sliders =
        Sliders::where('pos',2)->select('pic_exct')->get();
      return view('site.all_products')
      ->with('products',$products)
      ->with('CatName',$CatName)
      ->with('down_sliders',$down_sliders);
    }
    public function ShowSpesific_product($CatName,$ProductName)
    {

      $product=Product::where('Product_name',$ProductName)->first();

      $related_pic=ProductsPhoto::where('product_id',$product->id)->get();
      $Related = Product::where('SubCat_ID',$product->SubCat_ID)
      ->inRandomOrder()
      ->take(3)
      ->get();
      $cat = SubProgrammes::where('id',$product->SubCat_ID)->first();
      $catName =$cat->SubCat_name;
      $down_sliders =
        Sliders::where('pos',2)->select('pic_exct')->get();
      $links=products_videos::where('product_id',$product->id)->get();

      return view('site.Product_Details')
            ->with('product',$product)
            ->with('Related',$Related)
            ->with('catName',$catName)
            ->with('related_pic',$related_pic)
            ->with('down_sliders',$down_sliders)
            ->with('links',$links);
    }
    public function get_add_product()
    {
        $SubCats=SubProgrammes::pluck('SubCat_name','id');
        return view ('Admin.Add_product')->with('SubCats',$SubCats);
    }
    public function add_product(Request $request)
    {
       //dd($request->input('exampleInputFile')) ;
         $messages = [
            'SubCat_ID.required'              => 'please chhose the main Program',

            'Product_Name.required'           => 'please write the product name ',

            'Title_Desc.required'             => 'please write the some word  in description ',
            'Full_Desc.required'              =>'please write the some word  in description ',

            'PicExect1.required'        => "product's Photo is amust",

            'PicExect1.image'           => 'upload a Valid photo',

            'Benefits_title.required'              =>'please write the some word  in Benefits_title ',
            'Benefits_Desc.required'              =>'please write the some word  in Benefits_Desc ',
            'tech_title.required'              =>'please write the some word  in tech_title ',
            'tech_Desc.required'              =>'please write the some word  in tech_Desc ',
        ];
         $validatedData = Validator::make($request->all(),[
        'Product_Name'    => 'required|unique:products|max:255',
        'SubCat_ID'      => 'required',
        'Title_Desc'     => 'required',
        'PicExect1'     => 'required',
        'Full_Desc'     =>  'required',

        'Benefits_title'     => 'required',
        'Benefits_Desc'     =>  'required',
        'tech_title'     => 'required',
        'tech_Desc'     =>  'required',
         'pdf' => 'max:5120', //5MB


],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
        $NewProduct = new Product;
        $NewProduct->Product_name      =$request->input('Product_Name');
        $NewProduct->SubCat_ID         =$request->input('SubCat_ID');
        $NewProduct->Title_Desc        =$request->input('Title_Desc');
        $NewProduct->Full_Desc         =$request->input('Full_Desc');

        $NewProduct->Benefits_title    =$request->input('Benefits_title');
        $NewProduct->Benefits_Desc     =$request->input('Benefits_Desc');

        $NewProduct->tech_title        =$request->input('tech_title');
        $NewProduct->tech_Desc         =$request->input('tech_Desc');


        $Benefits_photo = $request->file('Benefits_photo');
            if(!empty($Benefits_photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $Benefits_photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/products/';

              $thumb           = Image::make($Benefits_photo)
                                    ->save($path.$photo_fullname);
              $NewProduct->Benefits_photo    = $photo_fullname;
            }

        $Tech_photo = $request->file('Tech_photo');
            if(!empty($Tech_photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $Tech_photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/products/';

              $thumb           = Image::make($Tech_photo)
                                    ->resize(520, 300)->save($path.$photo_fullname);
              $NewProduct->Tech_photo    = $photo_fullname;
            }

        $tech_pdf = $request->file('tech_pdf');
            if(!empty($tech_pdf)){

              $file_name          = str_random(5).time();
              $file_ext           = $tech_pdf->getClientOriginalExtension();
              $file_fullname      = $file_name .'.'.$file_ext;
              $path               = public_path().'/photos/products/files';

              $request->file('tech_pdf')->move($path, $file_fullname);

              $NewProduct->tech_pdf         =$file_fullname;
            }



        $photo = $request->file('PicExect1');
            if(!empty($photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/products/';

              $thumb           = Image::make($photo)
                                    ->resize(374, 241)->save($path.$photo_fullname);
              $NewProduct->pic_exct    = $photo_fullname;
            }
            $file = $request->file('pdf');
            if(!empty($file)){

              $file_name          = str_random(5).time();
              $file_ext           = $file->getClientOriginalExtension();
              $file_fullname      = $file_name .'.'.$file_ext;
              $path               = public_path().'/photos/products/files';

              $request->file('pdf')->move($path, $file_fullname);

              $NewProduct->file_exct    = $file_fullname;

            }
        if($NewProduct->save()){
            $last_Product = Product::latest()->first();
        $ProductID =$last_Product->id;
        if($request->hasFile('PicExect2'))
        {
            $photos=$request->File('PicExect2');

            foreach ($photos as $photo) {
                $NewPhoto = new ProductsPhoto;
              $photo_name      = str_random(5).time();
              $photo_ext       = $photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/products/';

              $thumb           = Image::make($photo)
                                    ->resize(374, 241)->save($path.$photo_fullname);
              $NewPhoto->pic_exct    = $photo_fullname;
              $NewPhoto->product_id=$ProductID;
              $NewPhoto->save();
            }
          }
            for($i=1;$i<5;$i++)
        {
            if(!empty($request->input('video'.$i)))
            {
            $NewLink = new products_videos;
            $NewLink->link=$request->input('video'.$i);
            $NewLink->product_id=$ProductID;

            $NewLink->save();
          }
         }



        notify()->flash('Program added successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

    }

}
    public function show_all_Products()
    {
        $all_porducts   = Product::join(
            'sub_programmes','products.SubCat_ID','sub_programmes.id')
            ->select('products.*','sub_programmes.SubCat_name')
            ->get();

        $related_photos = Product::join('products_photos','products.id','products_photos.product_id')->select('products_photos.*')->get();

        return view ('Admin.All_Products')
                ->with('all_porducts',$all_porducts)
                -> with('related_photos',$related_photos);


    }
    public function get_update_Products($ProductID)
    {
     $item=Product::find($ProductID);
      $SubCats=SubProgrammes::pluck('SubCat_name','id');
     $related_pic=ProductsPhoto::where('product_id',$ProductID)->get();
     $related_video=products_videos::where('product_id',$ProductID)->get();
     return view('Admin.edit_product')
     ->with('item',$item)
     ->with('SubCats',$SubCats)
     ->with('related_pic',$related_pic)
     ->with('related_video',$related_video);
    }
    public function update_Products($ProductID,Request $request)
    {

       //dd($request->input('exampleInputFile')) ;
         $messages = [
            'SubCat_ID.required'              => 'please chhose the main Program',

            'Product_Name.required'           => 'please write the product name ',

            'Title_Desc.required'             => 'please write the some word  in description ',
            'Full_Desc.required'              =>'please write the some word  in description ',



            'Benefits_title.required'           =>'please write the some word  in Benefits_title ',
            'Benefits_Desc.required'            =>'please write the some word  in Benefits_Desc ',
            'tech_title.required'               =>'please write the some word  in tech_title ',
            'tech_Desc.required'                =>'please write the some word  in tech_Desc ',
        ];
         $validatedData = Validator::make($request->all(),[
        'Product_Name'    => 'required|max:255',
        'SubCat_ID'       => 'required',
        'Title_Desc'      => 'required',

        'Full_Desc'       =>  'required',

        'Benefits_title'  => 'required',
        'Benefits_Desc'   =>  'required',
        'tech_title'      => 'required',
        'tech_Desc'       =>  'required',
        'pdf' => 'max:5120', //5MB


],$messages);

         if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
    }else {
        $update=Product::find($ProductID);
        $update->Product_name      =$request->input('Product_Name');
        $update->SubCat_ID         =$request->input('SubCat_ID');
        $update->Title_Desc        =$request->input('Title_Desc');
        $update->Full_Desc         =$request->input('Full_Desc');

        $update->Benefits_title    =$request->input('Benefits_title');
        $update->Benefits_Desc     =$request->input('Benefits_Desc');

        $update->tech_title        =$request->input('tech_title');
        $update->tech_Desc         =$request->input('tech_Desc');


        $Benefits_photo = $request->file('Benefits_photo');
            if(!empty($Benefits_photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $Benefits_photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/products/';

              $thumb           = Image::make($Benefits_photo)
                                    ->save($path.$photo_fullname);
              $NewProduct->Benefits_photo    = $photo_fullname;
            }

        $Tech_photo = $request->file('Tech_photo');
            if(!empty($Tech_photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $Tech_photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/products/';

              $thumb           = Image::make($Tech_photo)
                                    ->resize(520, 300)->save($path.$photo_fullname);
              $update->Tech_photo    = $photo_fullname;
            }

        $tech_pdf = $request->file('tech_pdf');
            if(!empty($tech_pdf)){

              $file_name          = str_random(5).time();
              $file_ext           = $tech_pdf->getClientOriginalExtension();
              $file_fullname      = $file_name .'.'.$file_ext;
              $path               = public_path().'/photos/products/files';

              $request->file('tech_pdf')->move($path, $file_fullname);

              $update->tech_pdf         =$file_fullname;
            }



        $photo = $request->file('PicExect1');
            if(!empty($photo)){
              $photo_name      = str_random(5).time();
              $photo_ext       = $photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/products/';

              $thumb           = Image::make($photo)
                                    ->resize(374, 241)->save($path.$photo_fullname);
              $NewProduct->pic_exct    = $photo_fullname;
            }
            $file = $request->file('pdf');
            if(!empty($file)){

              $file_name          = str_random(5).time();
              $file_ext           = $file->getClientOriginalExtension();
              $file_fullname      = $file_name .'.'.$file_ext;
              $path               = public_path().'/photos/products/files';

              $request->file('pdf')->move($path, $file_fullname);

              $update->file_exct    = $file_fullname;

            }
        if($update->save()){
            //$last_Product = Product::latest()->first();
        $ProductID =$ProductID;
        if($request->hasFile('PicExect2'))
        {
            $photos=$request->File('PicExect2');

            foreach ($photos as $photo) {
                $NewPhoto = new ProductsPhoto;
              $photo_name      = str_random(5).time();
              $photo_ext       = $photo->getClientOriginalExtension();
              $photo_fullname  = $photo_name.'.'.$photo_ext;
              $path            = public_path().'/photos/products/';

              $thumb           = Image::make($photo)
                                    ->resize(374, 241)->save($path.$photo_fullname);
              $NewPhoto->pic_exct    = $photo_fullname;
              $NewPhoto->product_id=$ProductID;
              $NewPhoto->save();
            }


        }

                //$DeleteRelated = new ProductsPhoto
          $deleteLinks = products_videos::where('product_id',$ProductID)->get();
          foreach ($deleteLinks as $delete) {
          $delete->delete();
          }



        for($i=1;$i<5;$i++)
        {
            if(!empty($request->input('video'.$i)))
            {
            $NewLink = new products_videos;
            $NewLink->link=$request->input('video'.$i);
            $NewLink->product_id=$ProductID;

            $NewLink->save();
          }
         }
        notify()->flash('Program updated successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'warning');
                return redirect()->back();
            }

    }

}

public function delete_related_photo($PhotoID)
{
            $delete= ProductsPhoto::find($PhotoID);
          if(!empty ($delete->pic_exct) ){
        $path_photo    = public_path().'/photos/products/'.$delete->pic_exct;
           if(file_exists($path_photo)){
        unlink($path_photo);
      }
    }

          if( $delete->delete()){
            notify()->flash('photo deleted successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'error');
                return redirect()->back();
            }
}

public function delete_product($ProductID)
{
          $delete= Product::find($ProductID);
          if(!empty ($delete->pic_exct) ){
        $path_photo    = public_path().'/photos/products/'.$delete->pic_exct;
           if(file_exists($path_photo)){
        unlink($path_photo);
      }
    }
          if(!empty ($delete->file_exct) ){
        $path_file     = public_path().'/photos/products/files/'.$delete->file_exct;
          if(file_exists($path_file)){

         unlink($path_file) ;
       }
   }

    if( $delete->delete()){

        $related_photos_ID = ProductsPhoto::where('product_id',$ProductID)->get();

         if($related_photos_ID->count())
         {
              foreach ($related_photos_ID as $item ) {
                //$DeleteRelated = new ProductsPhoto
                $deletePhoto = ProductsPhoto::find($item->id);
                $path   = public_path().'/photos/products/'.$deletePhoto->pic_exct;

                if(file_exists($path))
                {
                  unlink($path);
                  $deletePhoto->delete();
                }

              }
         }

            notify()->flash('product '.  $delete->Product_name .'  deleted successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'error');
                return redirect()->back();
            }

}

}
