@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Dasoard' }}</div>

                <div class="card-body">
                  <h4 class="card-title">Users Table</h4>

                  <p class="card-description">
                      <a href="{{ route('add-user') }}" class="btn btn-sm btn-primary">Tambah</a>
                  </p>

                  <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('edit-user', $user->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route('delete-user', $user->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>     
                                @endforeach
                             
                            </tbody>
                      </table>
                    {{-- pagination --}}
                      {{-- <div class="d-flex justify-content-center">
                        {!! $data->links() !!}
                    </div> --}}
                  </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
