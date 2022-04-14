<?php

namespace App\Http\Controllers\Admin\Inspiration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InspirationModel;
use Image;

class InspirationController extends Controller
{
    


      public function insp_list(Request $request){
    	$data['insp']=InspirationModel::where('status','!=','D')->orderBy('id','desc')->paginate(10);
    	return view('admin.pages.inspiration.insp_list')->with($data);
    }


    public function insp_add_form(){
    	return view('admin.pages.inspiration.insp_add');
    }



    public function insp_insert(Request $request){
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
          $image->move("storage/app/public/inspiration",$filename);

        ;

        $insp_ins=new InspirationModel();
        $insp_ins->name=$request->name;      
        $insp_ins->text=$request->desc;
        $insp_ins->status="A";
        $insp_ins->image=$filename;
        
        $insp_ins->save();
       return back()->with('success','The inspiration is added successfully.');
 

        
    }



    public function active($id){
    	// dd($id);
    	$obj=InspirationModel::where('id','=',$id)->update(['status'=>'A']);
        return back()->with("success",'Inspiration successfully activated');
    }


    public function inactive($id){
    	// dd($id);
    	$obj=InspirationModel::where('id','=',$id)->update(['status'=>'I']);
        return back()->with("success",'Inspiration successfully deactivated');
    }


      public function delete($id){
    	// dd($id);
    	$obj=InspirationModel::where('id','=',$id)->update(['status'=>'D']);
        return back()->with("success",'Inspiration successfully deleted');
    }



    public function edit_page($id){
    	$data['insp']=InspirationModel::where('id',$id)->first();
        return view('admin.pages.inspiration.insp_edit')->with($data);
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



          $srch=InspirationModel::where('id',$request->id)->first();
           @unlink('storage/app/public/inspiration/'.$srch->img);

          $image = $request->img;
          $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
          $image->move("storage/app/public/inspiration",$filename);
         $upd=array(
        'name'=>$request->name,
        'text'=>$request->desc,
        'image'=>$filename,
        );
      $data['insp']=InspirationModel::where('id',$request->id)->update($upd);
      return back()->with("success",'Inspiration successfully updated');
    }else{
  	 $upd=array(
        'name'=>$request->name,
        'text'=>$request->desc,
        //'image'=>$filename,
        );
      $data['insp']=InspirationModel::where('id',$request->id)->update($upd);
      return back()->with("success",'Inspiration successfully updated with out image');
    }
   
   }



    public function view($id){
      $data['insp']=InspirationModel::where('id',$id)->first();
        return view('admin.pages.inspiration.insp_view')->with($data);

   }





}
