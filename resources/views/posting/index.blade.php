@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Dashboard' }}</div>

                <div class="card-body">
                  <h4 class="card-title">Posts Table</h4>

                  <p class="card-description">
                      <a href="{{ route('add-posting') }}" class="btn btn-sm btn-primary">Tambah</a>
                  </p>

                  <div class="table-responsive pt-3">
                      <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Judul
                                    </th>
                                    <th>
                                        Topik
                                    </th>
                                    <th>
                                        Gambar
                                    </th>
                                    <th>
                                        Isi
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $posting)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $posting->user->name }}</td>
                                    <td>{{ $posting->judul }}</td>
                                    <td>{{ $posting->topik }}</td>
                                    <td>
                                       <img src="{{ asset('storage/' . $posting->gambar) }}" width="50" alt=""> 
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars_decode(\Illuminate\Support\Str::limit($posting->isi, 180, '...'))?>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit-posting', $posting->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route('delete-posting', $posting->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Delete</a>
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
