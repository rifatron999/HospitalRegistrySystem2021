<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;

class TreatmentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->middleware('role:system_user', ['only'=>'index']);
    }
    public function index()
    {
        $result = Treatment::paginate(2);
        return view('multiauth::admin.system_user.treatment',compact('result'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:treatments',
            'type' => 'required',
            'description' => 'required | max:191',
        ]);
         $inputs = $request->except('_token');
         $hospital = Treatment::create($inputs);
         return back()->with('status','✔ Added');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
         $id = \Crypt::decrypt($id);
        $result = Treatment::where('id',$id)->first();
        return view('multiauth::admin.system_user.treatmentEdit',compact('result'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required | max:191',
        ]);
        $id = \Crypt::decrypt($id);
        $inputs = $request->except('_token');
        $hospital = Treatment::find(  $id  );
        //dd( $inputs) ; 
        $hospital->update($inputs);
     return back()->with('status','✔ Updated');
    }

    
    public function destroy($id)
    {
        //dd($id);
        $id = \Crypt::decrypt($id);
        $delete = Treatment::find($id);
        $delete->delete();
        return back()->with('status',"✔ REMOVED");
    }
}
