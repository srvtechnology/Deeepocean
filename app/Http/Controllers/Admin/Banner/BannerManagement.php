<?php

namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Models\BannerModel;

class BannerManagement extends Controller
{
    
    
     public function banner_page(Request $request){
         $data['banner']=BannerModel::first();
         //dd( $data['banner']);
         return view('admin.pages.banner.banner_page')->with($data);
    }








   public function imgcheck(Request $request){
      //dd($requ);
        if ($request->hasFile('img'))
          {
            $image = $request->img;
            $height = Image::make($image)->height();
            $width = Image::make($image)->width();
            return response()->json(['h'=>$height,'w'=>$width]);
          }    
   }








   public function upload_banner(Request $request){
  //dd($request->all());

    if($request->img){
   	 $srch=BannerModel::first();
   	 if($srch){
     //dd($srch->id);
   	 	$image = $request->img;
        $height = Image::make($image)->height();          
        $width = Image::make($image)->width();

            if( ((int)$width)<700 ){               
              return back()->with('error',"Image dimension range (width:700px-1500px & height:500-1000); Uploaded size ".$width. " x ".$height )->withInput();
            }

            if( ((int)$width)>2000 ){               
              return back()->with('error',"Image dimension range (width:700px-1500px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }

            if( ((int)$height)<500 ){              
               return back()->with('error',"Image dimension range (width:700px-1500px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }

             if(  ((int)$height)>1000 ){
               return back()->with('error',"Image dimension range (width:700px-1500px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }
             @unlink('storage/app/public/banner_image/'.$srch->image);

	            $image = $request->img;
	            $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
	            $image->move("storage/app/public/banner_image",$filename);
	            $upd=array(
                  'image'=>$filename,
                   
                  //'description'=>@$request->desc,
                  'text_1'=>@$request->text_1,
                  'text_2'=>@$request->text_2,
                  'text_3'=>@$request->text_3,
                  'text_4'=>@$request->text_4,
                );
                BannerModel::where('id',$srch->id)->update($upd);
                return back()->with('success','Banner image changed successfully');
   	 }
   	 else{
   	 	$image = $request->img;
        $height = Image::make($image)->height();          
        $width = Image::make($image)->width();

            if( ((int)$width)<700 ){               
              return back()->with('error',"Image dimension range (width:700px-1500px & height:500-1000); Uploaded size ".$width. " x ".$height )->withInput();
            }

            if( ((int)$width)>2000 ){               
              return back()->with('error',"Image dimension range (width:700px-1500px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }

            if( ((int)$height)<500 ){              
               return back()->with('error',"Image dimension range (width:700px-1500px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }

             if(  ((int)$height)>1000 ){
               return back()->with('error',"Image dimension range (width:700px-1500px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }

            $image = $request->img;
            $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move("storage/app/public/banner_image",$filename);

            $banner=new BannerModel();
            $banner->image=$filename;
            $banner->description=@$request->desc;

            $banner->save();
            return back()->with('success','Banner image uploaded successfully');

   	  }   //else end 

    } //1st if end
    else{
       $srch2=BannerModel::first();
       $upd=array(
                  //'description'=>@$request->desc,
                   'text_1'=>@$request->text_1,
                  'text_2'=>@$request->text_2,
                  'text_3'=>@$request->text_3,
                  'text_4'=>@$request->text_4,
                );
                BannerModel::where('id',$srch2->id)->update($upd);
                return back()->with('success','Banner texts changed successfully');

    }

  }









}
