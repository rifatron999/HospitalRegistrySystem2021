@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Hospital</div>
                <hr>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" action="{{route('admin.hospital.update',Crypt::encrypt($result->id))}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Name</label>
                                <input name="name" type="text" class="form-control form-control-sm" value="{{ $result->name }}" required >
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Phone</label>
                                <input name="phone" type="number" class="form-control form-control-sm" value="{{ $result->phone }}" required>
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
                                <button type="submit" class="btn btn-success btn-sm center-block"> Update Hospital</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection