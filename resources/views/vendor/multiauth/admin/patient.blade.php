@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default ">
                <div class="panel-heading">Patient</div>
                <hr>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.patient.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label  class=" label label-primary">Code</label>
                                <input name="code" type="text" class="form-control form-control-sm" value="{{ uniqid() }}" required readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Name</label>
                                <input name="name" type="text" class="form-control form-control-sm" value="{{ old('name') }}" required >
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Email</label>
                                <input name="email" type="email" class="form-control form-control-sm" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label  class=" label label-primary"> Address</label>
                                <textarea  name="address" class="form-control " required >{{ old('address') }} </textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <div class="">
                                <button type="submit" class="btn btn-success btn-sm center-block">+ Add Patient</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-striped table-hover table-bordered" id="employee_table" width="100%" cellspacing="0" >
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Code</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($result as $key => $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->Code}}</td>
                                <td>{{$data->address}}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"  href="{{route('admin.patient.edit',Crypt::encrypt($data->id))}}" target="_blank" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.patient.destroy',Crypt::encrypt($data->id))}}" title="Remove Employee" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
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
@endsection