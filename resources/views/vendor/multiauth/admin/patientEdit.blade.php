@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default ">
                <div class="panel-heading">Patient</div>
                <hr>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" action="{{route('admin.patient.update',Crypt::encrypt($result->id))}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label  class=" label label-primary">Code</label>
                                <input name="code" type="text" class="form-control form-control-sm" value="{{ $result->code }}" required readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Name</label>
                                <input name="name" type="text" class="form-control form-control-sm" value="{{ $result->name }}" required >
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Email</label>
                                <input name="email" type="email" class="form-control form-control-sm" value="{{ $result->email }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label  class=" label label-primary"> Address</label>
                                <textarea  name="address" class="form-control " required >{{ $result->address }} </textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <div class="">
                                <button type="submit" class="btn btn-success btn-sm center-block"> Update Patient</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection