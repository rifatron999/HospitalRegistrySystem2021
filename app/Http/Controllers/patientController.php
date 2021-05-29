<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class patientController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->middleware('role:system_user', ['only'=>'index']);
    }
    public function index()
    {
        $result = Patient::paginate(2);
        return view('multiauth::admin.patient',compact('result'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:patients',
            'email' => 'required|unique:patients',
            'address' => 'required | max:191',
        ]);
         $inputs = $request->except('_token');
         //dd($inputs);
         $create = Patient::create($inputs);
         return back()->with('status','✔ Added');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
         $id = \Crypt::decrypt($id);
        $result = Patient::where('id',$id)->first();
        return view('multiauth::admin.patientEdit',compact('result'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'email' => 'required',
            'address' => 'required | max:191',
        ]);
        $id = \Crypt::decrypt($id);
        $inputs = $request->except('_token');
        $update = Patient::find(  $id  );
        $update->update($inputs);
     return back()->with('status','✔ Updated');
    }

    
    public function destroy($id)
    {
        //dd($id);
        $id = \Crypt::decrypt($id);
        $delete = Patient::find($id);
        $delete->delete();
        return back()->with('status',"✔ REMOVED");
    }
}
