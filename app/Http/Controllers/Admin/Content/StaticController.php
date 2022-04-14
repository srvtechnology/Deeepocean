<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content;

class StaticController extends Controller
{
    
     public function static_list(){
    	$data['content']=Content::orderBy('id')->paginate(10);
    	return view('admin.pages.static.static_list')->with($data);
    }




    public function static_edit($id){
    	//dd($id);

    	if($id=="1"){
    		$data['content']=Content::where('id',1)->first();
    	return view('admin.pages.static.about_us')->with($data);
    	}else{
    		$data['content']=Content::where('id',2)->first();
    	return view('admin.pages.static.mission')->with($data);
    	}

    }



    public function about_upd(Request $request){
    		$request->validate([
            'name' => 'required|min:3',
            'text_1' => 'required|min:3',        
        ]);


         // dd($request->all());
    	if($request->img){
          $srch=Content::where('id',$request->id)->first();
           @unlink('storage/app/public/about_us/'.$srch->img);

          $image = $request->img;
          $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
          $image->move("storage/app/public/about_us",$filename);
         $upd=array(
        'name'=>$request->name,
        'text_1'=>$request->text_1,
        'image'=>$filename,
        );
      $data['content']=Content::where('id',$request->id)->update($upd);
      return back()->with("success",'About us image successfully updated');
    }else{
  	 $upd=array(
        'name'=>$request->name,
        'text_1'=>$request->text_1,
        //'image'=>$filename,
        );
      $data['content']=Content::where('id',$request->id)->update($upd);
      return back()->with("success",'About us content successfully updated with out image');
    }
  }


  public function mission_upd(Request $request){
  		$request->validate([
            'name' => 'required|min:3',
            'text_1' => 'required|min:3',     
            'text_2' => 'required|min:3',    
        ]);


     
  	 $upd=array(
        'name'=>$request->name,
        'text_1'=>$request->text_1,
        'text_2'=>$request->text_2,
        //'image'=>$filename,
        );
     $s=Content::where('id',$request->id)->first();
     $m1=strlen($s->text_1);
     $v1=strlen($s->text_2);

     $m2=strlen($request->text_1);
     $v2=strlen($request->text_2);
     //dd($m1,$m2,$v1,$v2);
     if($m1 != $m2  && $v1 != $v2){
      $data['content']=Content::where('id',$request->id)->update($upd);
      return back()->with("success",'The mission and vision content successfully updated ');
     }elseif ($v1 != $v2) {
      $data['content']=Content::where('id',$request->id)->update($upd);
      return back()->with("success",' Our vision content is successfully updated. ');
     }elseif($m1 != $m2){
      $data['content']=Content::where('id',$request->id)->update($upd);
      return back()->with("success",' Our mission content is successfully updated.');

     }else{
      $data['content']=Content::where('id',$request->id)->update($upd);
      return back()->with("success",'The mission and vision content successfully updated ');
     }
    
  }



}
