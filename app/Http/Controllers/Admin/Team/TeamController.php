<?php

namespace App\Http\Controllers\Admin\Team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeamModel;
use Image;

class TeamController extends Controller
{
    
    public function team_list(){
      $data['team']=TeamModel::orderBy('id','asc')->paginate(10);
      return view('admin.pages.team.team_list')->with($data);
    }


    public function team_edit_view($id){
    	$data['team']=TeamModel::where('id',$id)->first();
      return view('admin.pages.team.team_edit')->with($data);
    }



    public function team_update(Request $request){
    	//dd($request->all());
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



			        $srch=TeamModel::where('id',$request->id)->first();
		            @unlink('storage/app/public/team/'.$srch->img);

		            $image = $request->img;
		            $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
		            $image->move("storage/app/public/team",$filename);
			        $upd=array(
			        'name'=>$request->name,
			        'role'=>$request->role,
			        'image'=>$filename,
			        );
			      $data['team_upd']=TeamModel::where('id',$request->id)->update($upd);
			      return back()->with("success",'team successfully updated');

    		}else{
    			$upd=array(
			        'name'=>$request->name,
			        'role'=>$request->role,
			        //'image'=>$filename,
			        );
			      $data['team_upd']=TeamModel::where('id',$request->id)->update($upd);
			      return back()->with("success",'team successfully updated');

    		}

    }



    public function team_view($id){
     $data['team']=TeamModel::where('id',$id)->first();
      return view('admin.pages.team.team_view')->with($data);
    }

}
