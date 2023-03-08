<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use Illuminate\Support\Facades\Hash;


class Emploies extends Controller
{
  public function index(){
    $emploies= Employe::all();
    return view('employe.index')->with(compact('emploies'));
  }
  public function create(){
    
    return view('employe.create');
  }
  public function store(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'destination' => 'required',
        'image'=> 'mimes:jpeg,jpg,png,gif|max:10000',
        'password' => 'required|min:6',
    ]);
    if($request->image!=null){

        $file =$request->image;
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('upload/userimg');
       
        $file->move($destinationPath,$fileName);
        $Image = $fileName;
        
      
    }
  $employe= new Employe;
  $employe->name=$request->name;
  $employe->email=$request->email;
  $employe->destination=$request->destination;
  $employe->password=Hash::make($request->password);
  $employe->image=$Image;
 

$employe->save();

   
  
    return redirect()->route('index')->with('success','Great! You have Successfully add employe');

  }
  public function delete($id){
    $employe = Employe::find($id)->delete();
    return redirect()->route('index')->with('danger','Great! You have Successfully delete mploye');
  }
  public function view($id){
    $employe= Employe::where('id',$id)->first();
    return view('employe.show')->with(compact('employe'));
  }
  public function edit($id){
    $employe=Employe::find($id)->first();
   
    return view('employe.edit')->with(compact('employe'));
  }
  public function update(Request $request,$id){
    
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'destination' => 'required',
        'image'=> 'mimes:jpeg,jpg,png,gif|max:10000',
        
    ]);
    $employe= Employe::find($id);
   
    
    if($request->old_img!=null){

        $this->validate($request, [
          'old_img' => 'image|mimes:jpg,png,jpeg|max:5000',
        ]);

      }if($request->old_img!=null){

            $file =$request->old_img;
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('upload/userimg');
            
            $file->move($destinationPath,$fileName);
            $Image = $fileName;
            
          
        }
     
      else{

             $Image =$employe->image;

      }
      $employe->name=$request->name;
      $employe->email=$request->email;
      $employe->image=$Image;
      $employe->destination=$request->destination;
      $employe->save();
      return redirect()->route('index')->with('update','Great! You have Successfully update employe');
  }
  
 
 
  
}
