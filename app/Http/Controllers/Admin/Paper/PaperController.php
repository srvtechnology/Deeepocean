<?php

namespace App\Http\Controllers\Admin\Paper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubjectModel;
use App\Models\CourseModel;
use App\Models\PaperModel;

class PaperController extends Controller
{
    public function paper_list(){

    	$data['all_paper']=PaperModel::where('status','!=','D')->orderBy('id','desc')->paginate(10);
    	return view('admin.pages.paper.paper_list')->with($data);

    }


    public function add_paper_form(){
    	$data['subject']=SubjectModel::where('status','A')->orderBy('id','desc')->get();
    	return view('admin.pages.paper.paper_add')->with($data);
    }




    public function insert_paper(Request $request){
       // dd($request->all());
       $request->validate([
            'name'=> 'required|min:3', 
            'subject'=> 'required', 
            'amount'=> 'required',   
            'promo_value'=> 'required',    
        ]);
      // dd($request->all());
       $insPaper=new PaperModel();
       $insPaper->name=$request->name;
       $insPaper->subject_id=$request->subject;
       $insPaper->status="A";
       $insPaper->amount=$request->amount;
        $insPaper->promo_value=$request->promo_value;
       $insPaper->save();

       return back()->with('success','Paper added.');
    }




       public function active($id){
    	// dd($id);
    	$obj=PaperModel::where('id','=',$id)->update(['status'=>'A']);
        return back()->with("success",'Paper successfully activated');
    }


    public function inactive($id){
    	// dd($id);
    	$obj=PaperModel::where('id','=',$id)->update(['status'=>'I']);
        return back()->with("success",'Paper successfully deactivated');
    }



        public function delete($id){
    	// dd($id);
    	$obj=PaperModel::where('id','=',$id)->update(['status'=>'D']);
        return back()->with("success",'Paper successfully deleted');
    }



    public function edit_paper_view($id){
    	$data['paper']=PaperModel::where('id','=',$id)->first();
    	$data['subject']=SubjectModel::where('status','A')->orderBy('id','desc')->get();
        return view('admin.pages.paper.paper_edit')->with($data);    
    }



    public function update_paper(Request $request){
    	   $request->validate([
            'name'=> 'required|min:3',   
            'subject'=> 'required', 
            'amount'=> 'required',  
            'promo_value'=> 'required',   
        ]);
    	    $updt=array(
        	'name'=>$request->name,
        	'subject_id'=>$request->subject,
            'amount'=> $request->amount,   
            'promo_value'=> $request->promo_value,    
        	
        );
        $up=PaperModel::where('id',$request->paper_id)->update($updt);
        return back()->with('success','updated.');
    }




    public function get_subject(Request $request){
        $data['subjects']=SubjectModel::where('course_id',$request->course_id)->where('status','A')->get();
        return view('admin.pages.paper.get_subject')->with($data);
    }
}
