<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prescription;
use App\Patient;
use App\Hospital;
use App\Disease;
use App\Treatment;

class prescriptionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->middleware('role:system_user', ['only'=>'index']);
    }
    public function index()
    {
        $patientList = Patient::select('id' , 'name' , 'code')->get()->toArray() ;
        $diseaseList = Disease::select('id' , 'name')->get()->toArray() ;
        $treatmentList = Treatment::select('id' , 'name')->get()->toArray() ;
        $hospital = Hospital::select('id' , 'name')->where('id' , auth()->user()->hospital_id )->get()->toArray() ;
        $result = Prescription::where('doctor_id', auth()->user()->id )->paginate(2);
        dd($result->toArray() );
        return view('multiauth::admin.doctor.Prescription',compact('result' , 'patientList' , 'hospital' ,'diseaseList' , 'treatmentList'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //dd( $request->toArray() );
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'patient_id' => 'required',
            'hospital_id' => 'required',
            'disease_id' => 'required',
            'treatment_id' => 'required',
            'division' => 'required',
            'district' => 'required',
            'status' => 'required',
            'date' => 'required',
            'doctor_id' => 'required',
        ]);
         $inputs = $request->except('_token');
         /*$inputs['disease_ids'] = json_encode( $inputs['disease_ids'] );
         $inputs['treatment_ids'] = json_encode( $inputs['treatment_ids'] );
         //dd($inputs);*/
         $create = Prescription::create($inputs);
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
