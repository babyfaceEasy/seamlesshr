@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('inc.flash_msg')

                <div class="card">
                    <div class="card-header">New Employee Profile</div>
    
                    <div class="card-body">
                            <form method="POST"  action="{{ route('employee.update', ['employee' => $employee])}}" aria-label="{{ __('Login') }}">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group row">
                                <label for="firstname" class="col-sm-4 col-form-label text-md-right">First Name</label>
    
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname', $employee->firstname) }}" required autofocus>
    
                                    @if ($errors->has('firstname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="lastname" class="col-sm-4 col-form-label text-md-right">Last Name</label>
        
                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname', $employee->lastname) }}" required >
        
                                        @if ($errors->has('lastname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $employee->email) }}"  >
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            <div class="form-group row">
                                    <label for="company_id" class="col-sm-4 col-form-label text-md-right">Company</label>
        
                                    <div class="col-md-6">
                                        <select name="company_id" id="company_id" class="form-control">
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}"
                                                    @if ($employee->company_id == $company->id)
                                                        selected="selected"
                                                    @endif
                                                    >{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('company_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('company_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label text-md-right">Phone</label>
        
                                    <div class="col-md-6">
                                        <input id="phone" type="name" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', $employee->phone) }}" >
        
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection