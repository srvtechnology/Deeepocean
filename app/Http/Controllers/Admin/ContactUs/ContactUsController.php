<?php

namespace App\Http\Controllers\Admin\ContactUs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactModel;

class ContactUsController extends Controller
{
    
     public function contact_list(){
    $data['contact']=ContactModel::orderBy('id','desc')->paginate(10);
     return view('admin.pages.contact.contact_list')->with($data);
   }


    public function contact_view($id){
    $data['contact']=ContactModel::where('id',$id)->first();
     return view('admin.pages.contact.contact_view')->with($data);
   }





}
