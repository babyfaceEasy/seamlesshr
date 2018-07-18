@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('inc.flash_msg')
            <div class="card">
                <div class="card-header">Company List</div>

                <div class="card-body">
                    <div class="col-sm-12 p-3">
                        <a href="{{route('company.create')}}" class="btn btn-primary">Create New Company</a>
                    </div>
                    <table class="table">
                        <tr>
                            <thead>
                                <th>s/n</th>
                                <th>Name</th>
                                <th>Email Addr.</th>
                                <th>Website</th>
                                <th></th>
                            </thead>
                        </tr>

                        @php 
                            $s_n = ($companies->currentpage()-1)*$companies->perpage()+1
                        @endphp
                        @forelse ($companies as $company)
                            <tr>
                                <td>{{$s_n++}}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website}}</td>
                                <td>
                                <a href="{{ route ('company.show', ['company' => $company])}}" class="btn btn-sm btn-secondary">View</a> 
                                <a href="{{ route('company.edit', ['company' => $company])}}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="mx-auto">There are currently no company in our database.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>

                <div class="card-footer">
                    {{$companies->links()}}
                    <div class="text-sm-left font-weight-light">
                        Showing {{($companies->currentpage()-1)*$companies->perpage()+1}} to {{$companies->currentpage()*$companies->perpage()}}
                        of  {{$companies->total()}} entries
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection