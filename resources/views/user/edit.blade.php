@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        {{-- form input --}}
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ Add }}</div> --}}
                <div class="card-body">
                    <h4 class="card-title">Edit Users</h4>

                    @if (Session::get('failed'))
                        <div class="alert alert-dismissible">{{ Session::get('failed') }}</div>
                    @endif

                        <form class="forms-sample" action="{{ route('update-user') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ $data->name }}" placeholder="Name">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" name="email" value="{{ $data->email }}" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword4" name="password"  placeholder="Password">
                              </div>


                              <button type="submit" class="btn btn-sm btn-primary me-2">Submit</button>
                              <a href="{{ route('user') }}" class="btn btn-light">Cancel</a>
                        </form>
                 

                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection