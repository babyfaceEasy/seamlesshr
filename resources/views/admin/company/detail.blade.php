@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('inc.flash_msg')
            <div class="card">
                <div class="card-header">Company Details</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td>{{$company->name}}</td> 
                        </tr>
                        <tr>
                            <th>Email Addr.</th>
                            <td>{{$company->email}}</td> 
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td>
                                <img src="<?php echo url("storage".$company->logo)?>" alt="{{$company->name . ' logo'}}" style="width:200px; height:400px">
                            </td> 
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td>{{$company->website}}</td> 
                        </tr>
                    </table>
                    <div>
                        <a href="{{ route('company.index') }}" class="btn btn-primary">Company List</a>
                        <form style="display:inline" method="post" action="{{ route('company.destroy', ['company' => $company])}}" >
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Delete Company</button>
                        </form>
                        <!--<a href="{{-- route('company.destroy', ['company' => $company]) --}}" class="btn btn-danger">Delete Company</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection