@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('inc.flash_msg')
            <div class="card">
                <div class="card-header">Employee Details</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Full name</th>
                            <td>{{$employee->firstname . ' ' . $employee->lastname}}</td> 
                        </tr>
                        <tr>
                            <th>Email Addr.</th>
                            <td>{{$employee->email}}</td> 
                        </tr>
                        <tr>
                            <th>Phone No.</th>
                            <td>{{$employee->phone}}</td> 
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>{{$employee->company->name}}</td> 
                        </tr>
                    </table>
                    <div>
                        <a href="{{ route('employee.index') }}" class="btn btn-primary">Employee List</a>
                        <form style="display:inline" method="post" action="{{ route('employee.destroy', ['employee' => $employee])}}" >
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Delete Employee</button>
                        </form>
                        <!--<a href="{{-- route('company.destroy', ['company' => $company]) --}}" class="btn btn-danger">Delete Company</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection