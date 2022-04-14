<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use Validator;
use AppOrder;
use App\Models\OrdereModel;
use Mail;
use App\Mail\PaymentEmail;
use App\Mail\PromoCodeMail;
use App\Mail\AdminPaymentEmail;
use App\User;
use App\Models\CourseModel;
use App\Models\SubjectModel;
use App\Models\PaperModel;
use App\Models\PromoCode;
use Auth;
use App\Mail\PromoUsedMail;

class CashfreeController extends Controller
{
    public function __construct() {
        //test
        // $this->APP_ID = "11123992946844de8460cc21a1932111";
        // $this->SECRET_KEY = "734749d73c21e9e57709d8ace0d8fda3f9c16477";


        //dev mode
        $this->APP_ID = "160598c8dac03e4eb0df1bf8f6895061";
        $this->SECRET_KEY = "a174bdc9c27523fdcc5df8929c07fdc093dddf1a";

        $this->minimumAmount = 10;
        $this->maximumAmount = 5000;
    }




     function cashfree_payment_gateway (){
       // dd(phpinfo());
        return View('frontend.payment.cashfree_payment_gateway');
    }

    function order (Request $request){
        $this->validate($request, [
            'customerName' => 'required',
            'customerPhone' => 'required',
            'customerEmail' => 'required|email',
            'amount' => 'required|numeric|between:'.$this->minimumAmount.','.$this->maximumAmount.'',
        ]);

        $customerName = $request->customerName;
        $customerPhone = $request->customerPhone;
        $customerEmail = $request->customerEmail;
        $amount = $request->amount;
        $now = new DateTime();
        $ctime = $now->format('Y-m-d H:i:s');

        $orderId = OrdereModel::insertGetId([
            'customerName' => $customerName,
            'customerPhone' => $customerPhone,
            'customerEmail' => $customerEmail,
            'amount' => $amount,
            'created_at' => $ctime,
            'status_id' => 3,
        ]);
        $secretKey =  $this->SECRET_KEY;
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

    function return_url (Request $request){
        //dd($request->all());
        $orderId = $request->orderId;
        $orderAmount = $request->orderAmount;
        $referenceId = $request->referenceId;// transaction id
        $txStatus = $request->txStatus;
        $paymentMode = $request->paymentMode;
        $txMsg = $request->txMsg;
        $txTime = $request->txTime;
        $signature = $request->signature;
        $secretkey = $this->SECRET_KEY;
        $data = $orderId . $orderAmount . $referenceId . $txStatus . $paymentMode . $txMsg . $txTime;
        $hash_hmac = hash_hmac('sha256', $data, $secretkey, true);
        $computedSignature = base64_encode($hash_hmac);
        if ($signature == $computedSignature) {
            if ($txStatus == 'SUCCESS'){
                // success query
                OrdereModel::where('id', $orderId)->update(['status_id' => 1,'transaction_id'=>@$referenceId]);




                

                //Insert the promo details of the registered user in to PromoCode database
                $getDetailsUser=OrdereModel::where('id', $orderId)->first();
                $UserDetails=User::where('id',$getDetailsUser->customer_id)->first();


                //check weather this promo code already present or not
                //if present then insert code will be skiped.

                $searchPromo=PromoCode::where('promo_code',$UserDetails->mobile)->count();

                if($searchPromo<1){

                $promo=new PromoCode;
                $promo->user_id=$UserDetails->id;
                $promo->promo_code=$UserDetails->mobile;
                $promo->paper_id=$UserDetails->paper;
                $promo->promo_value=$UserDetails->getPaperDetails->promo_value;
                $promo->save();

                }

                /*promo code mail part start*/
                $promoMail=[];
                if($UserDetails->promo_code_user_id){
                    $fetch_promo_user=PromoCode::where('user_id',$UserDetails->promo_code_user_id)->first();
                    $p_details=PaperModel::where('id',$UserDetails->paper)->first();
                    //dd($p_details);
                    $promoMail['promo_discount'] = $p_details->promo_value;
                    $promoMail['used_promo_discount'] = $fetch_promo_user->promo_code;
                }
                $promoMail['email_subject'] = "DeeepOcean-Invitation Code";
                $promoMail['email'] = $UserDetails->email;
                $promoMail['name'] =$UserDetails->name;
                $promoMail['promo_code'] = $UserDetails->mobile;
                //$promo['promo_value'] = $UserTable->getPaperDetails->promo_value;
                Mail::to( $promoMail['email'])->send(new PromoCodeMail($promoMail));
                /* promo mail part end*/




                //update total used_by and total count  of promo_code holder user in promo code table
            if($UserDetails->promo_code_user_id){
                //dd($UserDetails->promo_code_user_id);
                $updatePromoCodetable=[];
                $fetchh=PromoCode::where('user_id',$UserDetails->promo_code_user_id)->first();
                //dd($fetchh);
                $alredy_used_by= $fetchh->used_by;
                $updatePromoCodetable['total_count']=$fetchh->total_count+1;
                $updatePromoCodetable['used_by']=$alredy_used_by.','.$UserDetails->id;
                PromoCode::where('user_id',$UserDetails->promo_code_user_id)->update($updatePromoCodetable);


            
                //Mail sent to that user whose promo code we used.
                $PromoUserDetails=User::where('id',$UserDetails->promo_code_user_id)->first();
                $usedBy=User::where('id',$UserDetails->id)->first();
                 $promoUsedMail=[];
                $promoUsedMail['email_subject'] = "DeeepOcean-Invitation Code used";
                $promoUsedMail['email'] = $PromoUserDetails->email;
                 $promoUsedMail['name'] =$PromoUserDetails->name;
                $promoUsedMail['used_by_name'] =$usedBy->name;
                $promoUsedMail['promo_code'] = $PromoUserDetails->mobile;
                //$promo['promo_value'] = $UserTable->getPaperDetails->promo_value;
                Mail::to( $promoUsedMail['email'])->send(new PromoUsedMail($promoUsedMail));

            }











                /* --------------MAIL PART START--------------*/
                $getDetails=OrdereModel::where('id', $orderId)->first();
                $getmail=$getDetails->customerEmail;
                $UserTable=User::where('id',$getDetails->customer_id)->first();
                $course=$UserTable->getCourseDetails->name;
                $subject=$UserTable->getSubjectDetails->name;
                $paper=$UserTable->getPaperDetails->name;
                $price=$getDetails->amount;
                //dd($getmail);
                $mailData=array();
               
                $mailData['type'] = 1; //for user---------------
                $mailData['email_subject'] = "User-Payment success";
                $mailData['email'] = $getmail;
                $mailData['name'] =$getDetails->customerName;
                 
                $mailData['course'] = $course;
                $mailData['subject'] = $subject;
                $mailData['paper'] = $paper;
                $mailData['price'] = $price;
                 $mailData['t_id'] = $referenceId;
                
                Mail::to($getmail)->send(new PaymentEmail($mailData));

               // $mailDataAdmin['type'] = 2; //for admin-------------------
                $adminMail="info@deeepocean.co.in";
                $mailDataAdmin=array();
                $mailDataAdmin['email_subject2'] = "Admin-Payment success";
                $mailDataAdmin['email2'] = $getmail;
                $mailDataAdmin['name2'] =$getDetails->customerName;
                 
                 $mailDataAdmin['course'] = $course;
                $mailDataAdmin['subject'] = $subject;
                $mailDataAdmin['paper'] = $paper;
                $mailDataAdmin['price'] = $price;
               // $adminMail="jeetbasak54@gmail.com";
               // Mail::send(new ResetPassword($data));
                Mail::to($adminMail)->send(new AdminPaymentEmail($mailDataAdmin));
               // Mail::send(new AdminPaymentEmail($mailDataAdmin));

                /*------------MAIL END-------------------*/
                $succes_variables=$orderId;

                return redirect()->route('success.payment', $succes_variables);
            }else{
                // rejected query
                OrdereModel::where('id', $orderId)->update(['status_id' => 2,'transaction_id'=>@$referenceId]);
               



               //make the promo_code_user_id null
               $getDetailsUser=OrdereModel::where('id', $orderId)->first();
                $UserDetails=User::where('id',$getDetailsUser->customer_id)->update(['promo_code_user_id'=>null]);
               //  $getDetails=OrdereModel::where('id', $orderId)->first();
               //  $getmail=$getDetails->customerEmail;
               //  //dd($getmail);
               //  $mailData=array();
               
               //  $mailData['type'] = 1; //for user
               //  $mailData['email_subject'] = "Payment success";
               //  $mailData['email'] = $getmail;
               //  $mailData['name'] =$getDetails->customerName;
                
               //  Mail::to($getmail)->send(new PaymentEmail($mailData));

               // // $mailDataAdmin['type'] = 2; //for admin
               //  $adminMail="jeetbasak54@gmail.com";
               //  $mailDataAdmin=array();
               //  $mailDataAdmin['email_subject2'] = "Payment success";
               //  $mailDataAdmin['email2'] = $getmail;
               //  $mailDataAdmin['name2'] =$getDetails->customerName;
               //  $adminMail="jeetbasak54@gmail.com";
               // // Mail::send(new ResetPassword($data));
               //  Mail::send(new AdminPaymentEmail($mailDataAdmin));
                 $error_variables=$orderId;

                return redirect()->route('fail.payment',$error_variables);
            }
        }else{
            return redirect('cashfree-payment-gateway')->with('errorMessage', 'Signature not match');
        }
    }




public function success_payment($id){
     $data['id']=$id;
    return view('frontend.payment.successPayment')->with($data);
}

public function fail_payment($id){
    $data['id']=$id;
    return view('frontend.payment.failPayment')->with($data);
}





























 public function cron_job_payment_status(Request $request){
     $data=OrdereModel::orderBy('id','desc')->skip(0)->take(3)->where('status_id','3')->get();
     //dd($data);
         $a=[];
         foreach ($data as $key => $value) {
           
           $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://api.cashfree.com/pg/orders/'.$value->id.'', [
              'headers' => [
                'Accept' => 'application/json',
                'x-api-version' => '2022-01-01',
                'x-client-id' => '160598c8dac03e4eb0df1bf8f6895061',
                'x-client-secret' => 'a174bdc9c27523fdcc5df8929c07fdc093dddf1a',
              ],
            ]);

            $data = json_decode($response->getBody());

            if($data->order_status=="PAID"){
                OrdereModel::where('status_id','3')->where('id',$value->id)->update(['status_id'=>'1','transaction_id'=>$data->cf_order_id]);
            
            // array_push($a, $data->order_status);
            //echo $data->order_status;







                
                $orderId=$value->id;
                $referenceId=$data->cf_order_id;
                //Insert the promo details of the registered user in to PromoCode database
                $getDetailsUser=OrdereModel::where('id', $orderId)->first();
               // dd($orderId, $getDetailsUser);
                $UserDetails=User::where('id',$getDetailsUser->customer_id)->first();
              //  dd( $UserDetails);

                //check weather this promo code already present or not
                //if present then insert code will be skiped.

                $searchPromo=PromoCode::where('promo_code',$UserDetails->mobile)->count();
               // dd($searchPromo);
                if($searchPromo<1){

                $promo=new PromoCode;
                $promo->user_id=$UserDetails->id;
                $promo->promo_code=$UserDetails->mobile;
                $promo->paper_id=$UserDetails->paper;
                $promo->promo_value=$UserDetails->getPaperDetails->promo_value;
                $promo->save();

                }

                /*promo code mail part start*/
                $promoMail=[];
                if($UserDetails->promo_code_user_id){
                    $fetch_promo_user=PromoCode::where('user_id',$UserDetails->promo_code_user_id)->first();
                    $p_details=PaperModel::where('id',$UserDetails->paper)->first();
                    //dd($p_details);
                    $promoMail['promo_discount'] = $p_details->promo_value;
                    $promoMail['used_promo_discount'] = $fetch_promo_user->promo_code;
                }
                $promoMail['email_subject'] = "DeeepOcean-Invitation Code";
                $promoMail['email'] = $UserDetails->email;
                //dd($promoMail['email']);
                $promoMail['name'] =$UserDetails->name;
                $promoMail['promo_code'] = $UserDetails->mobile;
                //$promo['promo_value'] = $UserTable->getPaperDetails->promo_value;
                Mail::to( $promoMail['email'])->send(new PromoCodeMail($promoMail));
                /* promo mail part end*/




                //update total used_by and total count  of promo_code holder user in promo code table
            if($UserDetails->promo_code_user_id){
                //dd($UserDetails->promo_code_user_id);
                $updatePromoCodetable=[];
                $fetchh=PromoCode::where('user_id',$UserDetails->promo_code_user_id)->first();
                //dd($fetchh);
                $alredy_used_by= $fetchh->used_by;
                $updatePromoCodetable['total_count']=$fetchh->total_count+1;
                $updatePromoCodetable['used_by']=$alredy_used_by.','.$UserDetails->id;
                PromoCode::where('user_id',$UserDetails->promo_code_user_id)->update($updatePromoCodetable);


            
                //Mail sent to that user whose promo code we used.
                $PromoUserDetails=User::where('id',$UserDetails->promo_code_user_id)->first();
                $usedBy=User::where('id',$UserDetails->id)->first();
                 $promoUsedMail=[];
                $promoUsedMail['email_subject'] = "DeeepOcean-Invitation Code used";
                $promoUsedMail['email'] = $PromoUserDetails->email;
                 $promoUsedMail['name'] =$PromoUserDetails->name;
                $promoUsedMail['used_by_name'] =$usedBy->name;
                $promoUsedMail['promo_code'] = $PromoUserDetails->mobile;
                //$promo['promo_value'] = $UserTable->getPaperDetails->promo_value;
               Mail::to( $promoUsedMail['email'])->send(new PromoUsedMail($promoUsedMail));

            }






                /* --------------MAIL PART START- FOR SUCCESSFUL PAYMENT-------------*/
                $getDetails=OrdereModel::where('id', $orderId)->first();
                $getmail=$getDetails->customerEmail;
                $UserTable=User::where('id',$getDetails->customer_id)->first();
                $course=$UserTable->getCourseDetails->name;
                $subject=$UserTable->getSubjectDetails->name;
                $paper=$UserTable->getPaperDetails->name;
                $price=$getDetails->amount;
                //dd($getmail);
                $mailData=array();
               
                $mailData['type'] = 1; //for user---------------
                $mailData['email_subject'] = "User-Payment success";
                $mailData['email'] = $getmail;
                $mailData['name'] =$getDetails->customerName;
                 
                $mailData['course'] = $course;
                $mailData['subject'] = $subject;
                $mailData['paper'] = $paper;
                $mailData['price'] = $price;
                 $mailData['t_id'] = $referenceId;
                
                Mail::to($getmail)->send(new PaymentEmail($mailData));

               // $mailDataAdmin['type'] = 2; //for admin-------------------
                $adminMail="info@deeepocean.co.in";
                $mailDataAdmin=array();
                $mailDataAdmin['email_subject2'] = "Admin-Payment success";
                $mailDataAdmin['email2'] = $getmail;
                $mailDataAdmin['name2'] =$getDetails->customerName;
                 
                 $mailDataAdmin['course'] = $course;
                $mailDataAdmin['subject'] = $subject;
                $mailDataAdmin['paper'] = $paper;
                $mailDataAdmin['price'] = $price;
              
                Mail::to($adminMail)->send(new AdminPaymentEmail($mailDataAdmin));
         }
     }//close if tag of PAID check

     echo"done";
}



}
