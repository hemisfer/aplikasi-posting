@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        {{-- form input --}}
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ Add }}</div> --}}
                <div class="card-body">
                    <h4 class="card-title">Add Users</h4>

                    @if (Session::get('failed'))
                        <div class="alert alert-dismissible">{{ Session::get('failed') }}</div>
                    @endif

                        <form class="forms-sample" action="{{ route('store-user') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputName1" name="name" value="{{ old('name') }}" placeholder="Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail3" name="email"  value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="exampleInputPassword4" name="password"  value="{{ old('password') }}" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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