<?php

namespace App\Http\Controllers\Admin\Advisory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdvisoryModel;
use Image;

class AdvisoryController extends Controller
{
    

     public function adv_list(Request $request){
    	$data['adv']=AdvisoryModel::where('status','!=','D')->orderBy('id','desc')->paginate(10);
    	return view('admin.pages.advisory.adv_list')->with($data);
    }


    public function adv_add_form(){
    	return view('admin.pages.advisory.adv_add');
    }



    public function adv_insert(Request $request){
    	// dd($request->all());
    	$request->validate([
            'name' => 'required|min:3',
            'desc' => 'required|min:3',            
        ]);

        $image = $request->img;
        $height = Image::make($image)->height();          
        $width = Image::make($image)->width();

        if( ((int)$width)<200 ){               
              return back()->with('error',"Image dimension range (width:200px-1250px & height:100-700); Uploaded size ".$width. " x ".$height )->withInput();
            }

            if( ((int)$width)>1250 ){               
              return back()->with('error',"Image dimension range (width:200px-1250px & height:100-700); Uploaded size ".$width. " x ".$height)->withInput();
            }

            if( ((int)$height)<100 ){              
               return back()->with('error',"Image dimension range (width:200px-1250px & height:100-700); Uploaded size ".$width. " x ".$height)->withInput();
            }

             if(  ((int)$height)>700 ){
               return back()->with('error',"Image dimension range (width:200px-1250px & height:100-700); Uploaded size ".$width. " x ".$height)->withInput();
            }



       

         // dd("img");
          $image = $request->img;
          $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
          $image->move("storage/app/public/advisory",$filename);

        ;

        $adv_ins=new AdvisoryModel();
        $adv_ins->name=$request->name;      
        $adv_ins->text=$request->desc;
        $adv_ins->status="A";
        $adv_ins->image=$filename;
        
        $adv_ins->save();
       return back()->with('success','The advisory is added successfully.');
 

        
    }



    public function active($id){
    	// dd($id);
    	$obj=AdvisoryModel::where('id','=',$id)->update(['status'=>'A']);
        return back()->with("success",'advisory successfully activated');
    }


    public function inactive($id){
    	// dd($id);
    	$obj=AdvisoryModel::where('id','=',$id)->update(['status'=>'I']);
        return back()->with("success",'advisory successfully deactivated');
    }


      public function delete($id){
    	// dd($id);
    	$obj=AdvisoryModel::where('id','=',$id)->update(['status'=>'D']);
        return back()->with("success",'advisory successfully deleted');
    }



    public function edit_page($id){
    	$data['adv']=AdvisoryModel::where('id',$id)->first();
        return view('admin.pages.advisory.adv_edit')->with($data);
    }





    public function update(Request $request){
    //	dd($request->all());
    	$request->validate([
            'name' => 'required|min:3',
            'desc' => 'required|min:3',        
        ]);


         // dd($request->all());
    	if($request->img){


         $image = $request->img;
        $height = Image::make($image)->height();          
        $width = Image::make($image)->width();

        if( ((int)$width)<200 ){               
              return back()->with('error',"Image dimension range (width:200px-1250px & height:100-700); Uploaded size ".$width. " x ".$height )->withInput();
            }

            if( ((int)$width)>1250 ){               
              return back()->with('error',"Image dimension range (width:200px-1250px & height:100-700); Uploaded size ".$width. " x ".$height)->withInput();
            }

            if( ((int)$height)<100 ){              
               return back()->with('error',"Image dimension range (width:200px-1250px & height:100-700); Uploaded size ".$width. " x ".$height)->withInput();
            }

             if(  ((int)$height)>700 ){
               return back()->with('error',"Image dimension range (width:200px-1250px & height:100-700); Uploaded size ".$width. " x ".$height)->withInput();
            }



          $srch=AdvisoryModel::where('id',$request->id)->first();
           @unlink('storage/app/public/advisory/'.$srch->img);

          $image = $request->img;
          $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
          $image->move("storage/app/public/advisory",$filename);
         $upd=array(
        'name'=>$request->name,
        'text'=>$request->desc,
        'image'=>$filename,
        );
      $data['adv']=AdvisoryModel::where('id',$request->id)->update($upd);
      return back()->with("success",'advisory successfully updated');
    }else{
  	 $upd=array(
        'name'=>$request->name,
        'text'=>$request->desc,
        //'image'=>$filename,
        );
      $data['adv']=AdvisoryModel::where('id',$request->id)->update($upd);
      return back()->with("success",'advisory is successfully updated without image');
    }
   
   }



     public function view($id){
      $data['adv']=AdvisoryModel::where('id',$id)->first();
        return view('admin.pages.advisory.adv_view')->with($data);

   }


}
