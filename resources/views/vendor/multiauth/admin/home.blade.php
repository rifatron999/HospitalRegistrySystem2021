@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>

                <div class="panel-body">
                    You are logged in to {{ config('multiauth.prefix') }} side!
                    @if(isset($result))
                        <table class="table table-striped table-hover table-bordered datatable" id="employee_table" width="100%" cellspacing="0" >
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
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
@endsection