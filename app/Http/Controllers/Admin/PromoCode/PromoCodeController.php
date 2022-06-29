<?php

namespace App\Http\Controllers\Admin\PromoCode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use App\User;

class PromoCodeController extends Controller
{
    
    public function promo_list(){
      $data['promo_users']=PromoCode::orderBy('updated_at','desc')->where('is_delete','N')->get();
      return view('admin.pages.promo_code.promo_user_list')->with($data);
    }


    public function promo_details($id){
      $data['promo_users']=PromoCode::where('id',$id)->first();

      $user_list=$data['promo_users']->used_by;
      // dd($user_list);
      $unique_user_ids=[];
      $arr=explode(",",$user_list);
      for($i=1;$i<count($arr);$i++){
        array_push($unique_user_ids,$arr[$i]);
      }
       //dd($unique_user_ids);

      $data['usersDetails']=User::whereIn('id',$unique_user_ids)->paginate(10);
     // dd($data);
      return view('admin.pages.promo_code.promo_user_details')->with($data);
    }


     public function delete_soft_promo($id){
         $dlt=PromoCode::where('id',$id)->update(['is_delete'=>"Y"]);
         return back()->with('success','Promo Code User Details deleted.');
    }
}
