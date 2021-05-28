@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default ">
                <div class="panel-heading">Hospital</div>
                <hr>
                <div class="panel-body">
                     <form method="post" enctype="multipart/form-data" action="{{ route('admin.hospital.store') }}">
                    @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Name</label>
                                <input name="name" type="text" class="form-control form-control-sm" value="{{ old('name') }}" required >
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Phone</label>
                                <input name="phone" type="number" class="form-control form-control-sm" value="{{ old('phone') }}" required>
                            </div>
                        </div>{{--2 row--}}
                        {{--<div class="form-group row">

                        </div>--}}{{--5 row--}}
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label  class=" label label-primary"> Address</label>
                                <textarea  name="address" class="form-control " required >{{ old('address') }} </textarea>
                            </div>
                        </div>{{--6 row--}}
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success btn-lg center-block">+ Add Hospital</button>
                            </div>
                        </div>{{--7 row--}}
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection