<?php

namespace App\Http\Controllers\Admin\Subject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubjectModel;
use App\Models\CourseModel;
use App\Models\PaperModel;


class SubjectController extends Controller
{
    

    public function subject_list(){

    	$data['all_subject']=SubjectModel::where('status','!=','D')->orderBy('id','desc')->paginate(10);
    	return view('admin.pages.subject.subject_list')->with($data);

    }


    public function add_subject_form(){
    	$data['course']=CourseModel::where('status','A')->orderBy('id','desc')->get();
    	return view('admin.pages.subject.subject_add')->with($data);
    }




    public function insert_subject(Request $request){
       $request->validate([
            'name'=> 'required|min:3', 
            'course'=> 'required',    
        ]);
      // dd($request->all());
       $insSubject=new SubjectModel();
       $insSubject->name=$request->name;
       $insSubject->course_id=$request->course;
       $insSubject->status="A";
       $insSubject->save();

       return back()->with('success','Subject added.');
    }




       public function active($id){
    	// dd($id);
    	$obj=SubjectModel::where('id','=',$id)->update(['status'=>'A']);
        return back()->with("success",'Subject successfully activated');
    }


    public function inactive($id){
    	// dd($id);
    	$obj=SubjectModel::where('id','=',$id)->update(['status'=>'I']);
        return back()->with("success",'Subject successfully deactivated');
    }



        public function delete($id){
    	// dd($id);
    	$obj=SubjectModel::where('id','=',$id)->update(['status'=>'D']);
        @$get_all_paper=PaperModel::where('subject_id',$id)->get();
        foreach($get_all_paper as $val){
            $d=PaperModel::where('id','=',$val->id)->update(['status'=>'D']);
        }
        return back()->with("success",'Subject successfully deleted');
    }



    public function edit_subject_view($id){
    	$data['subject']=SubjectModel::where('id','=',$id)->first();
    	$data['course']=CourseModel::where('status','A')->orderBy('id','desc')->get();
        return view('admin.pages.subject.subject_edit')->with($data);    
    }



    public function update_subject(Request $request){
    	   $request->validate([
            'name'=> 'required|min:3',   
            'course'=> 'required',  
        ]);
    	    $updt=array(
        	'name'=>$request->name,
        	'course_id'=>$request->course,
        	
        );
        $up=SubjectModel::where('id',$request->sub_id)->update($updt);
        return back()->with('success','updated.');
    }
}
