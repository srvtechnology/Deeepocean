<?php

namespace App\Http\Controllers\Admin\Dasboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use App\Models\CourseModel;
use App\Models\SubjectModel;
use App\Models\PaperModel;
use App\Models\OrdereModel;
use App\Models\AdvisoryModel;
use App\Models\ProductModel;
use App\Models\InspirationModel;
use Auth;
use Mail;
use App\Mail\AdminForgetPass;
use Hash;
use DB;

class DashboardController extends Controller
{
    

      public function dashboard(Request $request){
        $data['course']=CourseModel::where('status','A')->count();
        $data['subject']=SubjectModel::where('status','A')->count();
        $data['paper']=PaperModel::where('status','A')->count();
        $data['success_paid']=OrdereModel::where('status_id','1')->count();
        $data['adv']=AdvisoryModel::where('status','A')->count();
        $data['pro']=ProductModel::where('status','A')->count();
        $data['insp']=InspirationModel::where('status','A')->count();

        //dd($data['faqs'],$data['services'],$data['testimonials'],$data['active_social'],  $data['schedules']);
    	return view('admin.pages.dashboard.dashboard')->with($data);
    }




    public function paid_user_list(Request $request){
    	$data['users']=OrdereModel::orderBy('id','desc');

        if($request->status){
            $data['users']=$data['users']->where('status_id',$request->status);
            $data['res']=$request->status;
        }
        $data['users']=$data['users']->get();
    	return view('admin.pages.users.paid_users_list')->with($data);
    }

    public function view_details($id){
        $data['details']=OrdereModel::where('id',$id)->first();
        return view('admin.pages.users.view_details_page')->with($data);


    }



    public function edit_view(){
        //dd(Auth::guard('admin')->user()->id);
        $data['admin']=Admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view('admin.pages.dashboard.edit_profile')->with($data);
    }


    public function update(Request $request){
    // dd($request->all());
    if($request->img){
        $image = $request->img;
          $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
          $image->move("storage/app/public/admin",$filename);


            if($request->old_password && $request->newPassword && $request->confirm){
                //dd("j");
                $request->validate([
                   'old_password'        => 'required|string|min:8',
                   'newPassword'=> 'required|min:8|required_with:confirm|same:confirm',
                   'confirm'=>'required|min:8', 
                 ]);
                $oldpassword = $request->input('old_password');
                if (!\Hash::check($oldpassword,Auth::guard('admin')->user()->password)) {
                    return redirect()->back()->with('error','You have entered wrong old password.');
                }else{
                    $updatepassword = Admin::where('id',Auth::guard('admin')->user()->id)->update([
                        'password'=>\Hash::make($request->input('newPassword')),
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'image'=>$filename,
                    ]);
                    return redirect()->back()->with('success','Profile updated successfully with password and image..');
                }

            }
            else{
               $updatepassword = Admin::where('id',Auth::guard('admin')->user()->id)->update([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'image'=>$filename,
                    ]);
                    return redirect()->back()->with('success','Profile updated successfully with image ');
            }

    }
    //////else for no image------
    else{

            if($request->old_password && $request->newPassword && $request->confirm){
            //dd("j");
                $request->validate([
                   'old_password'        => 'required|string|min:8',
                   'newPassword'=> 'required|min:8|required_with:confirm|same:confirm',
                   'confirm'=>'required|min:8', 
                 ]);
                $oldpassword = $request->input('old_password');
                if (!\Hash::check($oldpassword,Auth::guard('admin')->user()->password)) {
                    return redirect()->back()->with('error','You have entered wrong old password.');
                }else{
                    $updatepassword = Admin::where('id',Auth::guard('admin')->user()->id)->update([
                        'password'=>\Hash::make($request->input('newPassword')),
                        'name'=>$request->name,
                        'email'=>$request->email,
                    ]);
                    return redirect()->back()->with('success','Profile updated successfully with password..');
                }

         }else{
           $updatepassword = Admin::where('id',Auth::guard('admin')->user()->id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
            ]);
            return redirect()->back()->with('success','Profile updated successfully ');
         }
    }
}






public function del_adv(Request $request){
    $ids=$request->ids;
       $dlt= AdvisoryModel::whereIn('id',explode(",",$ids))->update(['status'=>'D']);
     return response()->json(['id'=>$ids]);
}


public function del_insp(Request $request){
     $ids=$request->ids;
       $dlt= InspirationModel::whereIn('id',explode(",",$ids))->update(['status'=>'D']);
     return response()->json(['id'=>$ids]);
}


public function del_prod(Request $request){
     $ids=$request->ids;
       $dlt= ProductModel::whereIn('id',explode(",",$ids))->update(['status'=>'D']);
     return response()->json(['id'=>$ids]);
}




public function del_course(Request $request){
     $ids=$request->ids;
     $course_ids=explode(",",$ids);
    $sub_to_paper=[];
     foreach($course_ids as $cours){
       $obj=CourseModel::where('id','=',$cours)->update(['status'=>'D']);
        $get_all_subjects=SubjectModel::where('course_id',$cours)->get();
        //dd($get_all_subjects);
       
        foreach($get_all_subjects as $val){
          @$d=SubjectModel::where('id',$val->id)->update(['status'=>'D']);
            array_push($sub_to_paper, @$val->id);
        }
        
     }
    @$d2=PaperModel::whereIn('subject_id',@$sub_to_paper)->update(['status'=>'D']);

      return response()->json(['id'=>$sub_to_paper]);

}



public function del_subject(Request $request){
     $ids=$request->ids;
     $course_ids=explode(",",$ids);
     foreach($course_ids as $sub){
        $obj=SubjectModel::where('id','=',$sub)->update(['status'=>'D']);
        @$get_all_paper=PaperModel::where('subject_id',$sub)->get();
        foreach($get_all_paper as $val){
            $d=PaperModel::where('id','=',$val->id)->update(['status'=>'D']);
        }
     }
}



public function del_paper(Request $request){
     $ids=$request->ids;
       $dlt= PaperModel::whereIn('id',explode(",",$ids))->update(['status'=>'D']);
     return response()->json(['id'=>$ids]);
}



/*forget password*/


public function enter_mail(){
    return view('admin.pages.fgp.enter_mail');
}


public function code_gen(Request $request){
   // dd($request->all());
    $srch=Admin::where('email',$request->email)->first();
    if($srch){
        $code=mt_rand(100000,999999);
        $upd=Admin::where('id',$srch->id)->update(['code'=>$code]);
          $data = [
                'email'=>$srch->email,
                'name'=>$srch->name,
                'email_vcode'=>$code,
                'id'=>$srch->id,
            ];
          Mail::send(new AdminForgetPass($data));
            return back()->with('success','A reset password link send to your email');

    }else{
        return back()->with('error','Email is wrong');
    }
}





   public function resetPassowrd($id,$vcode)
    {
       $data = Admin::where('code',$vcode)->where('id',$id)->first();
       if ($data===null) {
           return redirect()->route('admin.login')->with('error','Link expired');
       }
       return view('admin.pages.fgp.newpass',compact('data'));
    }



    public function newPassword(Request $request)
    {
        $password = $request->input('password'); 
       
        $updatepassword = Admin::where('id',$request->id)->update([
            'password'=>Hash::make($password),
            'code'=>''
        ]); 

        return redirect()->route('admin.login')->with('success','Password changed successfully');
    }









    /*terms and conditions*/


    public function term_list(){
        $data['tc']=DB::table('term_condition')->paginate(10);
        return view('admin.pages.tc.tc_list')->with($data);
    }


    public function term_edit($id){
        $data['tc']=DB::table('term_condition')->where('id',$id)->first();
        return view('admin.pages.tc.tc_edit')->with($data);
    }


    public function term_upd(Request $request){
        $upd['text']=$request->text;
        $u=DB::table('term_condition')->where('id',$request->id)->update($upd);
         return back()->with('success','Updated.');
    }



}
