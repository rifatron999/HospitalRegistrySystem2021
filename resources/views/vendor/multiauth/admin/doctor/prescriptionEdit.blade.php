@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default ">
                <div class="panel-heading">Treatment</div>
                <hr>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" action="{{route('admin.prescription.update',Crypt::encrypt($result[0]['id']))}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label  class=" label label-primary">Title</label>
                                <input name="title" type="text" class="form-control form-control-sm" value="{{ $result[0]['title'] }}" required >
                            </div>
                            <div class="col-sm-4">
                                <label  class=" label label-primary">Date</label>
                                <input name="date" type="date" class="form-control form-control-sm" value="{{ $result[0]['date'] }}" required >
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary ">Patient</label>
                                <select name="patient_id" class="form-control form-control-sm select2" required>
                                    <option value="">select</option>
                                    @foreach( $patientList as $data )
                                        @if( $data['id'] ==  $result[0]['patient_id']) 
                                            <option value="{{ $data['id']}}" selected>{{ $data['code'] }}-{{ $data['name'] }}</option>
                                        @else
                                            <option value="{{ $data['id']}}" >{{ $data['code'] }}-{{ $data['name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                    
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Hospital</label>
                                <select name="hospital_id" class="form-control form-control-sm select2" required>
                                    <option value="">select</option>
                                    @foreach( $hospital as $data ) 
                                        @if( $data['id'] ==  $result[0]['hospital_id']) 
                                            <option value="{{ $data['id']}}" selected >{{ $data['name'] }}</option>
                                        @else
                                            <option value="{{ $data['id']}}"  disabled>{{ $data['name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Disease</label>
                                <select name="disease_id[]" class="form-control form-control-sm select2" required multiple title="Please Press Ctrl for select Multiple">
                                    <option value="">select</option>
                                    @foreach( $diseaseList as $data ) 
                                            @if (in_array($data['id'] , $result[0]['disease_id']))
                                                <option value="{{ $data['id']}}" selected>{{ $data['name'] }}</option>
                                            @else
                                                <option value="{{ $data['id']}}" >{{ $data['name'] }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Treatment</label>
                                <select name="treatment_id[]" class="form-control form-control-sm select2" required multiple title="Please Press Ctrl for select" >
                                    <option value="">select</option>
                                    @foreach( $treatmentList as $data ) 
                                        @if (in_array($data['id'] , $result[0]['treatment_id']))
                                                <option value="{{ $data['id']}}" selected>{{ $data['name'] }}</option>
                                            @else
                                                <option value="{{ $data['id']}}" >{{ $data['name'] }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Division</label>
                                <select name="division" class="form-control form-control-sm select2" required  id="divisions" onchange="divisionsList();">
                                    <option value="">select</option>
                                    <option value="Barishal">Barishal</option>
                                    <option value="Chattogram">Chattogram</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Khulna" disabled>Khulna</option>
                                    <option value="Mymensingh" disabled>Mymensingh</option>
                                    <option value="Rajshahi" disabled>Rajshahi</option>
                                    <option value="Rangpur" disabled>Rangpur</option>
                                    <option value="Sylhet" disabled>Sylhet</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">District</label>
                                <select name="district" class="form-control form-control-sm select2" required  id="distr" > 
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Status</label>
                                <select name="status" class="form-control form-control-sm select2" required >
                                        <option value="">select</option>
                                    @if( $result[0]['status'] == "In Progress" )
                                        <option value="In Progress" selected> In Progress</option>
                                    @else
                                        <option value="In Progress" > In Progress</option>
                                    @endif
                                    @if( $result[0]['status'] == "Healthy" )
                                        <option value="Healthy" selected >Healthy</option>
                                    @else
                                        <option value="Healthy"  >Healthy</option>
                                    @endif
                                    @if( $result[0]['status'] == "Died" )
                                        <option value="Died" selected>Died</option>
                                    @else
                                        <option value="Died" >Died</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Doctor</label>
                                <input name="doctor_id" type="number" class="form-control form-control-sm" value="{{ $result[0]['doctor']['name'] }}" required hidden>
                                <input  type="text" class="form-control form-control-sm" value="{{ $result[0]['doctor']['name'] }}" readonly>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label  class=" label label-primary"> Description</label>
                                <textarea  name="description" class="form-control " required >{{ $result[0]['description'] }} </textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <div class="">
                                <button type="submit" class="btn btn-success btn-sm center-block">+ Update Prescription</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection