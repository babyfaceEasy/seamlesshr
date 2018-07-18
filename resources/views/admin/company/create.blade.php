@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('inc.flash_msg')

                <div class="card">
                    <div class="card-header">New Company Profile</div>
    
                    <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('company.store')}}" aria-label="{{ __('Login') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            <div class="form-group row">
                                    <label for="photo" class="col-sm-4 col-form-label text-md-right">Photo</label>
        
                                    <div class="col-md-6">
                                        <input id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" >
        
                                        @if ($errors->has('photo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('photo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            <div class="form-group row">
                                    <label for="website" class="col-sm-4 col-form-label text-md-right">Website</label>
        
                                    <div class="col-md-6">
                                        <input id="website" type="name" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website') }}" >
        
                                        @if ($errors->has('website'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('website') }}</strong>
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