@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default ">
                <div class="panel-heading">Prescription</div>
                <hr>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.prescription.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label  class=" label label-primary">Title</label>
                                <input name="title" type="text" class="form-control form-control-sm" value="{{ old('title') }}" required >
                            </div>
                            <div class="col-sm-4">
                                <label  class=" label label-primary">Date</label>
                                <input name="date" type="date" class="form-control form-control-sm" value="{{ old('date') }}" required >
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary ">Patient</label>
                                <select name="patient_id" class="form-control form-control-sm select2" required>
                                    <option value="">select</option>
                                    @foreach( $patientList as $data ) 
                                        <option value="{{ $data['id']}}">{{ $data['code'] }}-{{ $data['name'] }}</option>
                                    @endforeach
                                </select>
                                    
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Hospital</label>
                                <select name="hospital_id" class="form-control form-control-sm select2" required>
                                    <option value="">select</option>
                                    @foreach( $hospital as $data ) 
                                        <option value="{{ $data['id']}}" selected >{{ $data['name'] }}</option>
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
                                        <option value="{{ $data['id']}}">{{ $data['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Treatment</label>
                                <select name="treatment_id[]" class="form-control form-control-sm select2" required multiple title="Please Press Ctrl for select" >
                                    <option value="">select</option>
                                    @foreach( $treatmentList as $data ) 
                                        <option value="{{ $data['id']}}">{{ $data['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
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
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Status</label>
                                <select name="status" class="form-control form-control-sm select2" required >
                                    <option value="">select</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Healthy">Healthy</option>
                                    <option value="Died">Died</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Doctor</label>
                                <input name="doctor_id" type="number" class="form-control form-control-sm" value="{{ Auth::user()->id }}" required hidden>
                                <input  type="text" class="form-control form-control-sm" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label  class=" label label-primary"> Description</label>
                                <textarea  name="description" class="form-control " required >{{ old('description') }} </textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <div class="">
                                <button type="submit" class="btn btn-success btn-sm center-block">+ Create Prescription</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-striped table-hover table-bordered" id="employee_table" width="100%" cellspacing="0" >
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Patient</th>
                            <th scope="col">Hospital</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Disease</th>
                            <th scope="col">Treatment</th>
                            <th scope="col">Status</th>
                            <th scope="col">date</th>
                            <th scope="col">Location</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($result as $key => $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$data['title']}}</td>
                                <td>{{$data['patient']['name']}}</td>
                                <td>{{$data['hospital']['name']}}</td>
                                <td>{{$data['doctor']['name']}}</td>
                                <td>
                                    @foreach($data['disease'] as $dta)
                                        <p class="border border-info">{{$dta['name']}} </p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($data['treatment'] as $dta)
                                        <p class="border border-success">{{$dta['name']}} </p>
                                    @endforeach
                                </td>
                                <td>{{$data['status']}}</td>
                                <td>{{$data['date']}}</td>
                                <td>{{$data['division']}}-{{$data['district']}}</td>
                                <td>{{$data['description']}}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"  href="{{route('admin.prescription.edit',Crypt::encrypt($data['id']))}}" target="_blank" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.prescription.destroy',Crypt::encrypt($data['id']))}}" title="Remove Employee" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $result->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function divisionsList() {
    // get value from division lists
    var diviList = document.getElementById('divisions').value;

    // set barishal division districts
    if(diviList == 'Barishal'){     
        var disctList = '<option disabled selected>Select District</option><option value="Barguna">Barguna</option><option value="Barishal">Barishal</option><option value="Bhola">Bhola</option><option value="Jhalokati">Jhalokati</option><option value="Patuakhali">Patuakhali</option><option value="Pirojpur">Pirojpur</option>';
    }
    // set Chattogram division districts
    else if(diviList == 'Chattogram') {
        var disctList = '<option disabled selected>Select Division</option><option value="Bandarban">Bandarban</option><option value="Chandpur">Chandpur</option><option value="Chattogram">Chattogram</option><option value="Cumilla">Cumilla</option><option value="Cox\'s Bazar">Cox\'s Bazar</option><option value="Feni">Feni</option><option value="Khagrachhari">Khagrachhari</option><option value="Noakhali">Noakhali</option><option value="Rangamati">Rangamati</option>';   
    }
    // set Dhaka division districts
    else if(diviList == 'Dhaka') {
        var disctList = '<option disabled selected>Select Division</option><option value="Dhaka">Dhaka</option><option value="Faridpur">Faridpur</option><option value="Gazipur">Gazipur</option><option value="Gopalganj">Gopalganj</option><option value="Kishoreganj">Kishoreganj</option><option value="Madaripur">Madaripur</option><option value="Manikganj">Manikganj</option><option value="Munshiganj">Munshiganj</option><option value="Narayanganj">Narayanganj</option><option value="Narsingdi">Narsingdi</option><option value="Rajbari">Rajbari</option><option value="Shariatpur">Shariatpur</option><option value="Tangail">Tangail</option>';
    }
    //  set/send districts name to District lists from division
    document.getElementById("distr").innerHTML= disctList;
}


</script>
@endsection