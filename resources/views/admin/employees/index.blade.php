@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('inc.flash_msg')
            <div class="card">
                <div class="card-header">Employee List</div>

                <div class="card-body">
                    <div class="col-sm-12 p-3">
                        <a href="{{route('employee.create')}}" class="btn btn-primary">Add New Employee</a>
                    </div>
                    <table class="table">
                        <tr>
                            <thead>
                                <th>s/n</th>
                                <th>Name</th>
                                <th>Email Addr.</th>
                                <th>Company Name</th>
                                <th></th>
                            </thead>
                        </tr>

                        @php 
                            $s_n = ($employees->currentpage()-1)*$employees->perpage()+1
                        @endphp
                        @forelse ($employees as $employee)
                            <tr>
                                <td>{{$s_n++}}</td>
                                <td>{{ $employee->firstname .' '. $employee->lastname }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->company->name}}</td>
                                <td>
                                <a href="{{ route ('employee.show', ['employee' => $employee])}}" class="btn btn-sm btn-secondary">View</a> 
                                <a href="{{ route('employee.edit', ['employee' => $employee])}}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="mx-auto">There are currently no employee in our database.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>

                <div class="card-footer">
                    {{$employees->links()}}
                    <div class="text-sm-left font-weight-light">
                        Showing {{($employees->currentpage()-1)*$employees->perpage()+1}} to {{$employees->currentpage()*$employees->perpage()}}
                        of  {{$employees->total()}} entries
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection