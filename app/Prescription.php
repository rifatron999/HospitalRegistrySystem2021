<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [ 'title' , 'description' , 'division' , 'district' , 'status' , 'date' , 'patient_id' , 'hospital_id', 'doctor_id' , 'disease_id' , 'treatment_id'];

    public function setDiseaseIdAttribute($value)
    {
        if($value){
        	//dd($value);
        	$this->attributes['disease_id'] = json_encode($value);//mutatur
        }
    }

    public function getDiseaseIdAttribute($value)
    {
        return json_decode($value);//accessor
    }

    public function setTreatmentIdAttribute($value)
    {
        if($value){
        	$this->attributes['treatment_id'] = json_encode($value);//mutatur
        }
    }

    public function getTreatmentIdAttribute($value)
    {
        return json_decode($value);//accessor
    }
}
