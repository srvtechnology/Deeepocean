<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\CourseModel;
use App\Models\SubjectModel;
use App\Models\PaperModel;
use DateTime;
use Validator;
use AppOrder;
use App\Models\OrdereModel;
use App\Models\InspirationModel;
use App\Models\ContactModel;
use App\Models\Content;
use App\Models\ProductModel;
use App\Models\AdvisoryModel;
use DB;
use App\Models\PromoCode;
use Mail;
use App\Mail\ContactUs;

class RegController extends Controller
{

     public function __construct() {
        //test
        // $this->APP_ID = "11123992946844de8460cc21a1932111";
        // $this->SECRET_KEY = "734749d73c21e9e57709d8ace0d8fda3f9c16477";
          
          //dev
          $this->APP_ID = "160598c8dac03e4eb0df1bf8f6895061";
          $this->SECRET_KEY = "a174bdc9c27523fdcc5df8929c07fdc093dddf1a";

        $this->minimumAmount = 1;
        $this->maximumAmount = 500000;
    }


   public function index(){
    $data['insp']=InspirationModel::where('status','A')->get();
     $data['advp']=AdvisoryModel::where('status','A')->get();
     $data['product']=ProductModel::where('status','A')->get();
     $data['aboutus']=Content::where('id','1')->first();
      $data['mission']=Content::where('id','2')->first();
     return view('frontend.pages.landing_page')->with($data);
   }


   public function reg_one(){
     return view('frontend.pages.reg');
   }





    
    public function reg_step_one(Request $request){
    	//dd($request->all());
    	   $request->validate([
            'name'=> 'required',
            'email' => 'required',
            'ph' => 'required|min:10',
            'course' => 'required',
        ]);

    	   $ins=new User();
    	   $ins->name=$request->name;
    	   $ins->email=$request->email;
    	   $ins->mobile=$request->ph;
    	   $ins->course=$request->course;
    	   $ins->slug=str_slug($request->name.time());

    	   $ins->save();

    	   $data['user_details'] = User::where('id',$ins->id)->first();
    	   return redirect()->route('reg.two',$data['user_details']->slug)->with('success','Please fill up following information.');

    }








    public function reg_step_two_view($slug){
    	$data['user']=User::where('slug',$slug)->first();

        //fetch all subject under selected course
        $data['subject']=SubjectModel::where('course_id',$data['user']->course)->where('status','A')->get();
    	//dd("h",$user);
    	return view('frontend.pages.reg_two')->with($data);

    }







    public function reg_step_two_insert(Request $request){
    	// dd($request->all());
    	$up=array(
    		'dob'=>$request->dob,
    		'subject'=>$request->subject,
    		'paper'=>$request->paper
    	);
      //here gst will come
      if($request->promo_code_user_id){
        $up['promo_code_user_id']=$request->promo_code_user_id;
      }
    	$upd=User::where('id',$request->u_id)->update($up);


      //update total used_by user in promo code table
      //if($request->promo_code_user_id){
      // $fetchh=PromoCode::where('user_id',$request->promo_code_user_id)->first();
      // $alredy_used_by= $fetchh->used_by;
      // $up2['total_count']=$fetchh->total_count+1;
      // $up2['used_by']=$alredy_used_by.','.$request->u_id;
      // PromoCode::where('user_id',$request->promo_code_user_id)->update($up2);
     // }
        // $data['user_details'] = User::where('id',$request->u_id)->first();
    	//return redirect()->route('pay',$data['user_details']->slug)->with('success','Please fill up following information.');

        //cashfree part------*****************************************-----------------
            $this->validate($request, [
            'customerName' => 'required',
            'customerPhone' => 'required',
            'customerEmail' => 'required|email',
            'amount' => 'required|numeric|between:'.$this->minimumAmount.','.$this->maximumAmount.'',
        ]);

        $customerName = $request->customerName;
        $customerPhone = $request->customerPhone;
        $customerEmail = $request->customerEmail;
        $customerId = $request->customerId;
        $amount = $request->amount;
        $now = new DateTime();
        $ctime = $now->format('Y-m-d H:i:s');

        $orderId = OrdereModel::insertGetId([
            'customerName' => $customerName,
            'customerPhone' => $customerPhone,
            'customerEmail' => $customerEmail,
            'customer_id'  => $customerId,
            'amount' => $amount,
            'created_at' => $ctime,
            'status_id' => 3,
        ]);
        $secretKey =  $this->SECRET_KEY;
        //dd( $orderId);
        $postData = array(
            "appId" => $this->APP_ID,
            "orderId" => $orderId,
            "orderAmount" => $amount,
            "orderCurrency" => 'INR',
            "orderNote" => 'Wallet',
            "customerName" => $customerName,
            "customerPhone" => $customerPhone,
            "customerEmail" => $customerEmail,
            "returnUrl" => url('return-url'),
            "notifyUrl" => url('notify-url'),
            'secretKey' => $secretKey,
        );
        return view('frontend.payment.cashfree_confirmation')->with($postData);
    }








    public function payment($slug){
        $data['user']=User::where('slug',$slug)->first();
        //dd("h",$user);
        return view('frontend.pages.payment')->with($data);
    }








    public function paper_fetch(Request $request){
        $data['paper']=PaperModel::where('subject_id',$request->sub_id)->where('status','A')->get();
        return view('frontend.pages.fetch_paper')->with($data);
    }


    public function paper_fetch_details(Request $request){
          $data['paper']=PaperModel::where('id',$request->paper_id)->first();
          $data['subject']=SubjectModel::where('id', $data['paper']->subject_id)->first();

          return response()->json(['id'=>$data['paper'],"subject"=>$data['subject']]); 
         // return response()->json(['id'=>$request->paper_id]); 

    }




    public function contact_us(Request $request){
        //dd($request->all());
           $ins=new ContactModel();
           $ins->name=$request->name;
           $ins->email=$request->email;
           $ins->phone=$request->ph;
           $ins->res=$request->res;  //course
           $ins->text=$request->text;

           $ins->save();
           

           //course 
            $course=CourseModel::where('id',$request->res)->first();


           //mail
            $adminMail="info@deeepocean.co.in";
            $mailDataAdmin=array();
            $mailDataAdmin['email_subject'] = "DeeepOcean Contact";
           
            $mailDataAdmin['name'] =$request->name;
            $mailDataAdmin['email'] =$request->email;
            $mailDataAdmin['phone'] =$request->ph;
            $mailDataAdmin['course'] =$course->name;
            $mailDataAdmin['text'] =$request->text;
            
            Mail::to($adminMail)->send(new ContactUs($mailDataAdmin));

           return back()->with('success_contact','We will contact you soon.');

    }



    public function p_p(){
       $data['pp']=DB::table('term_condition')->where('id','3')->first();
       return view('frontend.pages.privacy_policy')->with($data);
    }



    public function chk_promo(Request $request){
      $srch=PromoCode::where('promo_code',$request->promo_code)->count();
       $user_Details=PromoCode::where('promo_code',$request->promo_code)->first();
       if($srch>0){
        $paper_details=PaperModel::where('id',$request->paper_id)->first();
        $promo_value=$paper_details->promo_value;
       return response()->json(['promo'=>$request->promo_code,'paper_id'=>$request->paper_id,'msg'=>'Correct','promo_value'=>$promo_value,'user_id_of_promo_code'=>$user_Details->user_id]);
       }else{
          return response()->json(['msg'=>'Wrong']);
       }
    }
}
