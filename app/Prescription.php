<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [ 'title' , 'description' , 'division' , 'district' , 'status' , 'date' , 'patient_id' , 'hospital_id', 'doctor_id' , 'disease_ids' , 'treatment_ids'];
}
