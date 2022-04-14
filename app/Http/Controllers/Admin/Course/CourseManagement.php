<?php

namespace App\Http\Controllers\Admin\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubjectModel;
use App\Models\CourseModel;
use App\Models\PaperModel;


class CourseManagement extends Controller
{
    


    public function course_list(){
    	$data['courses']=CourseModel::where('status','!=','D')->orderBy('id','desc')->paginate(10);
    	return view('admin.pages.course.course_list')->with($data);

    }


    public function add_course_form(){
    	return view('admin.pages.course.course_add');
    }


    public function insert_course(Request $request){
       $request->validate([
            'name'=> 'required|min:3',
            'due_amount'=> 'required',    
        ]);
      // dd($request->all());
       $insCourse=new CourseModel();
       $insCourse->name=$request->name;
       $insCourse->due_amount=$request->due_amount;
       $insCourse->status="A";
       $insCourse->save();

       return back()->with('success','Course added.');
    }




       public function active($id){
    	// dd($id);
    	$obj=CourseModel::where('id','=',$id)->update(['status'=>'A']);
        return back()->with("success",'Course successfully activated');
    }


    public function inactive($id){
    	// dd($id);
    	$obj=CourseModel::where('id','=',$id)->update(['status'=>'I']);
        return back()->with("success",'Course successfully deactivated');
    }



        public function delete($id){
    	// dd($id);
    	$obj=CourseModel::where('id','=',$id)->update(['status'=>'D']);
        $get_all_subjects=SubjectModel::where('course_id',$id)->get();
        //dd($get_all_subjects);
        $sub_to_paper=[];
        foreach($get_all_subjects as $val){
           @$d=SubjectModel::where('id',$val->id)->update(['status'=>'D']);
            array_push($sub_to_paper, @$val->id);
        }
        @$d2=PaperModel::whereIn('subject_id',@$sub_to_paper)->update(['status'=>'D']);
       // dd($sub_to_paper);


        return back()->with("success",'Course successfully deleted');
    }



    public function edit_course_view($id){
    	$data['course']=CourseModel::where('id','=',$id)->first();
        return view('admin.pages.course.course_edit')->with($data);    
    }



    public function update_course(Request $request){
    	   $request->validate([
            'name'=> 'required|min:3',
            'due_amount'=> 'required',    
        ]);
    	    $updt=array(
        	'name'=>$request->name,
            'due_amount'=>$request->due_amount,
        	
        );
        $up=CourseModel::where('id',$request->course_id)->update($updt);
        return back()->with('success','updated.');
    }

}
