<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disease;

class diseaseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->middleware('role:system_user', ['only'=>'index']);
    }
    public function index()
    {
        $result = Disease::paginate(2);
        return view('multiauth::admin.system_user.disease',compact('result'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:diseases',
            /*'type' => 'required',*/
            'description' => 'required | max:191',
        ]);
         $inputs = $request->except('_token');
         $hospital = Disease::create($inputs);
         return back()->with('status','✔ Added');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
         $id = \Crypt::decrypt($id);
        $result = Disease::where('id',$id)->first();
        return view('multiauth::admin.system_user.diseaseEdit',compact('result'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            /*'type' => 'required',*/
            'description' => 'required | max:191',
        ]);
        $id = \Crypt::decrypt($id);
        $inputs = $request->except('_token');
        $hospital = Disease::find(  $id  );
        //dd( $inputs) ; 
        $hospital->update($inputs);
     return back()->with('status','✔ Updated');
    }

    
    public function destroy($id)
    {
        //dd($id);
        $id = \Crypt::decrypt($id);
        $delete = Disease::find($id);
        $delete->delete();
        return back()->with('status',"✔ REMOVED");
    }
}
