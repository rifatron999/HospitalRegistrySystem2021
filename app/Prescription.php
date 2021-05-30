<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient;
use App\Hospital;
use App\Disease;
use App\Treatment;
use App\Admin;

class Prescription extends Model
{
    protected $fillable = [ 'title' , 'description' , 'division' , 'district' , 'status' , 'date' , 'patient_id' , 'hospital_id'						, 'doctor_id' , 'disease_id' , 'treatment_id'
						  ];

  	public function patient()
	{
		return $this->belongsTo(Patient::class);
	}
	public function hospital()
	{
		return $this->belongsTo(Hospital::class);
	}
	public function disease()
	{
		return $this->belongsTo(Disease::class);
	}
	public function treatment()
	{
		return $this->belongsTo(Treatment::class);
	}
	public function doctor()
	{
		return $this->belongsTo(Admin::class);
	}

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
