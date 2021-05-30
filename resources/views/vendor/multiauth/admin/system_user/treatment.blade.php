@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Treatment</div>
                <hr>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.treatment.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Name</label>
                                <input name="name" type="text" class="form-control form-control-sm" value="{{ old('name') }}" required >
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Type</label>
                                <select name="type" class="form-control form-control-sm select2" required>
                                        <option value="">select</option>
                                        <option value="Medicine">Medicine</option>
                                        <option value="Therapy">Therapy</option>
                                        <option value="Surgery">Surgery</option>
                                </select>
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
                                <button type="submit" class="btn btn-success btn-sm center-block">+ Add Treatment</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-striped table-hover table-bordered" id="employee_table" width="100%" cellspacing="0" >
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($result as $key => $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->type}}</td>
                                <td>{{$data->description}}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"  href="{{route('admin.treatment.edit',Crypt::encrypt($data->id))}}" target="_blank" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.treatment.destroy',Crypt::encrypt($data->id))}}" title="Remove Employee" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
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