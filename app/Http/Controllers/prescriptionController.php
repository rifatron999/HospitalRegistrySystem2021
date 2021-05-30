<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prescription;

class prescriptionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->middleware('role:system_user', ['only'=>'index']);
    }
    public function index()
    {
        $result = Prescription::where('doctor_id', auth()->user()->id )->paginate(2);
        return view('multiauth::admin.doctor.Prescription',compact('result'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:hospitals',
            'phone' => 'required|unique:hospitals',
            'address' => 'required',
        ]);
         $inputs = $request->except('_token');
         $create = Hospital::create($inputs);
         return back()->with('status','✔ Added');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
         $id = \Crypt::decrypt($id);
        $result = Hospital::where('id',$id)->first();
        return view('multiauth::admin.system_user.hospitalEdit',compact('result'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $id = \Crypt::decrypt($id);
        $inputs = $request->except('_token');
        $update = Hospital::find(  $id  );
        //dd( $inputs) ; 
        $update->update($inputs);
     return back()->with('status','✔ Updated');
    }

    
    public function destroy($id)
    {
        //dd($id);
        $id = \Crypt::decrypt($id);
        $delete = Hospital::find($id);
        $delete->delete();
        return back()->with('status',"✔ REMOVED");
    }
}
