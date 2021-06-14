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
        $result = Prescription::with([
                                'patient' => function($q){
                                    $q->select('id', 'name');
                                },
                                'hospital' => function($q){
                                    $q->select('id', 'name');
                                },
                                'doctor' => function($q){
                                    $q->select('id', 'name');
                                },/*
                                'disease' => function($q){
                                    $q->select('id', 'name');
                                },
                                'treatment' => function($q){
                                    $q->select('id', 'name');
                                }*/
                            ])
                            ->where('doctor_id', auth()->user()->id )
                            ->orderBy('date', 'desc')
                            ->paginate(2);
        foreach ($result as $key => $value) {
            $diseaseList = Disease::select('id' , 'name' )->whereIn('id' , $value['disease_id'])->get()->toArray() ;
            $result[$key]['disease'] = $diseaseList;

            $treatmentList = Treatment::select('id' , 'name' )->whereIn('id' , $value['treatment_id'])->get()->toArray() ;
            $result[$key]['treatment'] = $treatmentList;
        }
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
        $patientList = Patient::select('id' , 'name' , 'code')->get()->toArray() ;
        $diseaseList = Disease::select('id' , 'name')->get()->toArray() ;
        $treatmentList = Treatment::select('id' , 'name')->get()->toArray() ;
        $hospital = Hospital::select('id' , 'name')/*->where('id' , auth()->user()->hospital_id )*/->get()->toArray() ;
        $result = Prescription::with([
                                'patient' => function($q){
                                    $q->select('id', 'name');
                                },
                                'hospital' => function($q){
                                    $q->select('id', 'name');
                                },
                                'doctor' => function($q){
                                    $q->select('id', 'name');
                                },/*
                                'disease' => function($q){
                                    $q->select('id', 'name');
                                },
                                'treatment' => function($q){
                                    $q->select('id', 'name');
                                }*/
                            ])
                            ->where('id', $id )
                            ->orderBy('date', 'desc')
                            ->get();
        /*foreach ($result as $key => $value) {
            $diseaseList = Disease::select('id' , 'name' )->whereIn('id' , $value['disease_id'])->get()->toArray() ;
            $result[$key]['disease'] = $diseaseList;

            $treatmentList = Treatment::select('id' , 'name' )->whereIn('id' , $value['treatment_id'])->get()->toArray() ;
            $result[$key]['treatment'] = $treatmentList;
        }*/
        //dd( $result->toArray() );
        return view('multiauth::admin.doctor.prescriptionEdit', compact('result' , 'patientList' , 'hospital' ,'diseaseList' , 'treatmentList'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'patient_id' => 'required',
            'hospital_id' => 'required',
            'disease_id' => 'required',
            'treatment_id' => 'required',
            'status' => 'required',
            'date' => 'required',
        ]);
        $id = \Crypt::decrypt($id);
        $inputs = $request->except('_token');
        $update = Prescription::find(  $id  );
        //dd( $inputs) ; 
        $update->update($inputs);
     return back()->with('status','✔ Updated');
    }

    
    public function destroy($id)
    {
        //dd($id);
        $id = \Crypt::decrypt($id);
        $delete = Prescription::find($id);
        $delete->delete();
        return back()->with('status',"✔ REMOVED");
    }
}
