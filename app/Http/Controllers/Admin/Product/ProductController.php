<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Image;

class ProductController extends Controller
{
    


      public function prod_list(Request $request){
    	$data['prod']=ProductModel::where('status','!=','D')->orderBy('id','desc')->paginate(10);
    	return view('admin.pages.product.prod_list')->with($data);
    }


    public function prod_add_form(){
    	return view('admin.pages.product.prod_add');
    }



    public function prod_insert(Request $request){
    	// dd($request->all());
    	$request->validate([
            'name' => 'required|min:3',
            //'link' => 'required',
            'desc' => 'required|min:3',            
        ]);



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
       

         // dd("img");
          $image = $request->img;
          $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
          $image->move("storage/app/public/product",$filename);

        ;

        $prod_ins=new ProductModel();
        $prod_ins->name=$request->name;      
        $prod_ins->text=$request->desc;
        $prod_ins->link=$request->link;
        $prod_ins->status="A";
        $prod_ins->image=$filename;
        
        $prod_ins->save();
       return back()->with('success','The product added successfully.');
 

        
    }



    public function active($id){
    	// dd($id);
    	$obj=ProductModel::where('id','=',$id)->update(['status'=>'A']);
        return back()->with("success",'product successfully activated');
    }


    public function inactive($id){
    	// dd($id);
    	$obj=ProductModel::where('id','=',$id)->update(['status'=>'I']);
        return back()->with("success",'product successfully deactivated');
    }


      public function delete($id){
    	// dd($id);
    	$obj=ProductModel::where('id','=',$id)->update(['status'=>'D']);
        return back()->with("success",'product successfully deleted');
    }



    public function edit_page($id){
    	$data['prod']=ProductModel::where('id',$id)->first();
        return view('admin.pages.product.prod_edit')->with($data);
    }





    public function update(Request $request){
    //	dd($request->all());
    	$request->validate([
            'name' => 'required|min:3',
            //'link' => 'required',
            'desc' => 'required|min:3',        
        ]);


         // dd($request->all());
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





          $srch=ProductModel::where('id',$request->id)->first();
           @unlink('storage/app/public/product/'.$srch->img);

          $image = $request->img;
          $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
          $image->move("storage/app/public/product",$filename);
         $upd=array(
        'name'=>$request->name,
        'text'=>$request->desc,
        'link'=>$request->link,
        'image'=>$filename,
        );
      $data['prod']=ProductModel::where('id',$request->id)->update($upd);
      return back()->with("success",'product successfully updated');
    }else{
  	 $upd=array(
        'name'=>$request->name,
        'text'=>$request->desc,
        'link'=>$request->link,
        //'image'=>$filename,
        );
      $data['prod']=ProductModel::where('id',$request->id)->update($upd);
      return back()->with("success",'product successfully updated with out image');
    }
   
   }



   public function view($id){
   		$data['prod']=ProductModel::where('id',$id)->first();
        return view('admin.pages.product.prod_view')->with($data);

   }

}
