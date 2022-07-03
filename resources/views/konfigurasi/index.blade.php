@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Dashboard' }}</div>

                <div class="card-body">
                  <h4 class="card-title">Configuration Table</h4>

                  @if ($data == null || $data == ''  )
                  <p class="card-description">
                    <a href="{{ route('add-konfigurasi') }}" class="btn btn-sm btn-primary">Tambah</a>
                </p>
   
                  @endif
                 
                  <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    <th>
                                        Gambar
                                    </th>
                                    <th>About</th>
                                    <th>Contact</th>
                                    <th>Hubungi Kami</th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $konfigurasi)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                       <img src="{{ asset('storage/' . $konfigurasi->gambar) }}" width="50" alt=""> 
                                    </td>
                                    <td><?=htmlspecialchars_decode ( $konfigurasi->about )?></td>
                                    <td><?= htmlspecialchars_decode ( $konfigurasi->contact ) ?></td>
                                    <td><?= htmlspecialchars_decode ($konfigurasi->hubungikami) ?></td>
                                    <td>{{ $konfigurasi->created_at }}</td>
                                    <td>
                                        <a href="{{ route('edit-konfigurasi', $konfigurasi->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route('delete-konfigurasi', $konfigurasi->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Delete</a>
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
