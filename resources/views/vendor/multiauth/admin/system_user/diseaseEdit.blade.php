@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Disease</div>
                <hr>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" action="{{route('admin.disease.update',Crypt::encrypt($result->id))}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label  class=" label label-primary">Name</label>
                                <input name="name" type="text" class="form-control form-control-sm" value="{{ $result->name }}" required >
                            </div>
                            <!-- <div class="col-sm-6">
                                <label  class=" label label-primary">Type</label>
                                    <select name="type" class="form-control form-control-sm" required>
                                            <option value="">select</option>
                                            @if( $result->type == 'Medicine' )
                                                <option value="Medicine" selected>Medicine</option>
                                            @else
                                                <option value="Medicine">Medicine</option>
                                            @endif
                                            @if( $result->type == 'Therapy')   
                                                <option value="Therapy" selected>Therapy</option>
                                            @else
                                                <option value="Therapy">Therapy</option>
                                            @endif
                                            @if( $result->type == 'Surgery')
                                                <option value="Surgery"selected>Surgery</option>
                                            @else
                                                <option value="Surgery">Surgery</option>
                                            @endif
                                    </select>
                            </div> -->
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label  class=" label label-primary"> Description</label>
                                <textarea  name="description" class="form-control " required >{{ $result->description }} </textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <div class="">
                                <button type="submit" class="btn btn-success btn-sm center-block"> Update Disease</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection