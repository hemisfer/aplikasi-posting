@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Dashboard' }}</div>

                <div class="card-body">
                  <h4 class="card-title">Comments Table</h4>
{{-- 
                  <p class="card-description">
                      <a href="{{ route('add-posting') }}" class="btn btn-sm btn-primary">Tambah</a>
                  </p> --}}

                  <div class="table-responsive pt-3">
                      <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Post_ID
                                    </th>
                                    <th>
                                        Judul Post
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Message
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $comment)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $comment->posting->id }}</td>
                                    <td>{{ $comment->posting->judul }}</td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ $comment->phone }}</td>
                                    <td>
                                        <?php echo htmlspecialchars_decode(\Illuminate\Support\Str::limit($comment->message, 180, '...'))?>
                                    </td>
                                    <td>
                                        <a href="{{ route('delete-comment', $comment->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Delete</a> 
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
