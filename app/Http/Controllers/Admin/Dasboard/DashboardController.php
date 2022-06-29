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
use App\Models\PromoCode;
use App\Mail\UserUpdateEmail;

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
    	$data['users']=OrdereModel::orderBy('updated_at','desc')->where('is_delete','N');

        if($request->from_date && $request->to_date){
           $from = $request->from_date;
           $to_prev= $request->to_date;
           $to=date('Y-m-d', strtotime($to_prev. ' + 1 days'));

            $data['users']=$data['users']->whereBetween('updated_at',[$from, $to])->where('is_delete','N')->OrwhereBetween('created_at',[$from, $to])->where('is_delete','N');
            $data['res']=$request->all();
        }
        $data['users']=$data['users']->get();
    	return view('admin.pages.users.paid_users_list')->with($data);
    }


    /*START-- 4/18/2022*/
    public function paid_user_list_success(Request $request){

        $data['users']=OrdereModel::orderBy('updated_at','desc')->where('status_id','1')->where('is_delete','N');

        if($request->from_date && $request->to_date){
           $from = $request->from_date;
           $to_prev= $request->to_date;
           $to=date('Y-m-d', strtotime($to_prev. ' + 1 days'));

            $data['users']=$data['users']->whereBetween('updated_at',[$from, $to])->where('status_id','1')->where('is_delete','N')->OrwhereBetween('created_at',[$from, $to])->where('status_id','1')->where('is_delete','N');
            $data['res']=$request->all();
        }
        $data['users']=$data['users']->get();
       // dd("s");
        return view('admin.pages.users.paid_users_list')->with($data);
    }

    public function paid_user_list_failed(Request $request){
        $data['users']=OrdereModel::orderBy('updated_at','desc')->where('status_id','2')->where('is_delete','N');

        if($request->from_date && $request->to_date){
           $from = $request->from_date;
           $to_prev= $request->to_date;
           $to=date('Y-m-d', strtotime($to_prev. ' + 1 days'));

            $data['users']=$data['users']->whereBetween('updated_at',[$from, $to])->where('status_id','2')->where('is_delete','N')->OrwhereBetween('created_at',[$from, $to])->where('status_id','2')->where('is_delete','N');
            $data['res']=$request->all();
        }
        $data['users']=$data['users']->get();
        //dd("f");
        return view('admin.pages.users.paid_users_list')->with($data);
    }

    public function paid_user_list_inprogress(Request $request){
        $data['users']=OrdereModel::orderBy('updated_at','desc')->where('status_id','3')->where('is_delete','N');

       if($request->from_date && $request->to_date){
           $from = $request->from_date;
           $to_prev= $request->to_date;
           $to=date('Y-m-d', strtotime($to_prev. ' + 1 days'));

            $data['users']=$data['users']->whereBetween('updated_at',[$from, $to])->where('status_id','3')->where('is_delete','N')->OrwhereBetween('created_at',[$from, $to])->where('status_id','3')->where('is_delete','N');
            $data['res']=$request->all();
        }
        $data['users']=$data['users']->get();
        return view('admin.pages.users.paid_users_list')->with($data);
    }

    /*END--4/12/2022*/




    

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




/*4/18/2022*/
    public function edit_page_user($id){
    
     $userDetails=OrdereModel::where('id',$id)->first();
     //dd($id,$userDetails);
     $user_id=$userDetails->customer_id;
     $data['datas']=User::where('id',$user_id)->first();
     return view('admin.pages.users.edit')->with($data);
    }



    public function update_user(Request $request){
      //  dd($request->all());

        //update user table
        $up1=User::where('id',$request->id)->update(['email'=>$request->email,'mobile'=>$request->mobile]);

        //update to payment table
        $up2=OrdereModel::where('customer_id',$request->id)->update(['customerEmail'=>$request->email,'customerPhone'=>$request->mobile]);

        //update to promo code table
        $up3=PromoCode::where('user_id',$request->id)->update(['promo_code'=>$request->mobile]);


        //update award transaction details
        $array=[];
        if($request->pp){
            $array['trans_number']=$request->pp;
        }
        if($request->gp){
            $array['trans_number']=$request->gp;
        }
        if($request->ptm){
            $array['trans_number']=$request->ptm;
        }
        if($request->upi){
            $array['upi']=$request->upi;
        }

        if($request->bank_name){
            $array['bank_name']=$request->bank_name;
            $array['acc_no']=$request->acc_no;
            $array['ifsc_code']=$request->ifsc_code;
            $array['bank_user_name']=$request->bank_user_name;
        }

        $up4=User::where('id',$request->id)->update($array);


        //mail sent to user
        $userDetails=User::where('id',$request->id)->first();
         $data = [
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'name'=>$userDetails->name,
            ];
          Mail::send(new UserUpdateEmail($data));

        return back()->with('success','User Details Updated.');

    }


    public function delete_soft($id){
         $dlt=OrdereModel::where('id',$id)->update(['is_delete'=>"Y"]);
         return back()->with('success','User Details deleted.');
    }
























  public function export_data(Request $request)
   {
    //dd($request->all());
   if($request->status_id=="3"){
    $data['users']=OrdereModel::orderBy('updated_at','desc')->where('is_delete','N');
  }else{
    $data['users']=OrdereModel::orderBy('updated_at','desc')->where('is_delete','N');
  }
    
    $status_id=[];
    if($request->status_id=="0"){
      $status_id=['1','2','3'];
    }
    else{
      array_push($status_id,$request->status_id);
    }



        if($request->from_date_exp && $request->to_date_exp){
           $from = $request->from_date_exp;
           $to_prev= $request->to_date_exp;
           $to=date('Y-m-d', strtotime($to_prev. ' + 1 days'));

            $data['users']=$data['users']->whereBetween('updated_at',[$from, $to])->whereIn('status_id',$status_id)->where('is_delete','N')->OrwhereBetween('created_at',[$from, $to])->whereIn('status_id',$status_id)->where('is_delete','N');
           
          }
          else{
            $data['users']=$data['users']->whereIn('status_id',$status_id);

          }
           $data['total_users']=$data['users']->get();
         // dd($data['total_users'],$request->status_id);
          
          if(count($data['total_users']) <1 ){
            return back()->with('error','No data Found.');
          }




            
    $abc=$data['total_users'];
    // dd($abc);
    $data = '';
    
      $data .='<table>
      <tr>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Order id</th>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Customer Name</th>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Mobile</th>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Email</th>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">DOB</th>


      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Fee</th>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Facilitation Fees</th>
       <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Gst</th>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Amount</th>
     

      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Transaction id</th>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Transaction Status</th>



      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">User Provided Transaction Type</th>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">User Provided Transaction Details</th>
      





     <th style="border:1px solid white;background-color
      :#cc00cc;color:white; width:100px;">Promo Code Used </th>
       <th style="border:1px solid white;background-color
      :#cc00cc;color:white; width:100px;">Promo Code User Name </th>



      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Course  </th>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Subject </th>
       <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Paper </th>
      <th style="border:1px solid white;background-color
      :#cc00cc;color:white;">Time</th>
     
   
      </tr>
      ';
      foreach (@$abc as $value) {
        // booking status 
        if ($value->status_id=="1") {
          $status = "Success";
        }elseif ($value->status_id=="2") {
          $status = "Failed";
        }elseif($value->status_id=="3"){
           $status = "In Progress";
        }
        else{
             $status = "In Progress";
        }
         //promo code used
        $promo=\DB::table('promo_code_master')->where('user_id',@$value->getUserDetails->promo_code_user_id)->first();
        // if($promo){
        //     if($promo->total_count=="0"){
        //         $pr="N/A";
        //     }else{
        //         $pr=$promo->total_count;
        //     }

        // }else{
        //     $pr="N/A";
        // }

        if($promo){
          $pr=$promo->promo_code;
          $user=User::where('id',$promo->user_id)->first();
          $nm=@$user->name;
          //dd($nm);
        }else{
          $pr="N/A";
          $nm="N/A";
        }

        if(@$value->transaction_id){
          $ti=$value->transaction_id;

        }else{
          $ti="N/A";
        }


        //transation type and details
        if(@$value->getUserDetails->trans_type=="PPY"){
          $type="PhonePe Number";
          $type_details=@$value->getUserDetails->trans_number;
        }
        elseif(@$value->getUserDetails->trans_type=="GPY"){
          $type="Gpay Number";
          $type_details=@$value->getUserDetails->trans_number;
        }
        elseif(@$value->getUserDetails->trans_type=="PTM"){
           $type="Paytm Number";
          $type_details=@$value->getUserDetails->trans_number;
        }
        elseif(@$value->getUserDetails->trans_type=="UPI"){
          $type="UPI ID";
          $type_details=@$value->getUserDetails->upi;
        }
          elseif(@$value->getUserDetails->trans_type=="BNK"){
            $type="Bank";
          $type_details="Bank name: ".@$value->getUserDetails->bank_name."<br>".
          "Account No: ".@$value->getUserDetails->acc_no."<br>".
          "Ifsc Code: ".@$value->getUserDetails->ifsc_code."<br>".
          "Account Holder name: ".@$value->getUserDetails->bank_user_name;
          }
          else{
           $type="N/A";
           $type_details="N/A";
          }


          //time
          if(@$value->updated_at){
            $time_date=@$value->updated_at;
          }else{
            $time_date=@$value->created_at;
          }
         
  
        

        $data .= '
        <tr>
        <td style="border:1px solid black;">'.@$value->id.'</td>
        <td style="border:1px solid black;">'.@$value->customerName.'</td>
        <td style="border:1px solid black;">'.@$value->getUserDetails->mobile.'</td>
        <td style="border:1px solid black;">'.@$value->getUserDetails->email.'</td>
        <td style="border:1px solid black;">'.@$value->getUserDetails->dob.'</td>
        
        <td style="border:1px solid black;">'.@$value->getUserDetails->getCourseDetails->due_amount.'</td>
        <td style="border:1px solid black;">'.@$value->getUserDetails->getPaperDetails->amount.'</td>
        <td style="border:1px solid black;">'.round(@$value->gst,2).'</td>
        <td style="border:1px solid black;">'.@$value->amount.'</td>

        <td style="border:1px solid black;">'.@$ti.'</td>
        <td style="border:1px solid black;">'.@$status.'</td>


        <td style="border:1px solid black;">'.@$type.'</td>
        <td style="border:1px solid black;">'.@$type_details.'</td>


        <td style="border:1px solid black;">'.@$pr.'</td>
         <td style="border:1px solid black;">'.@$nm.'</td>
        <td style="border:1px solid black;">'.@$value->getUserDetails->getCourseDetails->name.'</td>
        <td style="border:1px solid black;">'.@$value->getUserDetails->getSubjectDetails->name.'</td>
        <td style="border:1px solid black;">'.@$value->getUserDetails->getPaperDetails->name.'</td>



        <td style="border:1px solid black;">'.@$time_date.'</td>
        
       
        
        
        </tr>';
      }
      $data .= '</table>';
    
      //dd($data);
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=details.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");
    //dd($data); 
    echo $data;
    // return view('admin.modules.employers.manage_employers',$data);
   }


}
