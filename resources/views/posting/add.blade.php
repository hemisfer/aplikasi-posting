@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        {{-- form input --}}
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ Add }}</div> --}}
                <div class="card-body">
                    <h4 class="card-title">Add Posts</h4>

                    @if (Session::get('failed'))
                        <div class="alert alert-dismissible">{{ Session::get('failed') }}</div>
                    @endif

                        <form class="forms-sample" action="{{ route('store-posting') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                         
                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <select name="user_id" class="form-control" id="">
                                  <option value="">--Pilih--</option>
                                  @foreach ($user as $usr)
                                      <option {{ old('user_id') == $usr->id ? "selected" : "" }} value="{{ $usr->id }}"  >{{ $usr->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Judul</label>
                                <input type="text" class="form-control  @error('judul') is-invalid @enderror" id="exampleInputName1" name="judul" value="{{ old('judul') }}" placeholder="Judul">
                                @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail3">Topik</label>
                                <input type="text" class="form-control  @error('topik') is-invalid @enderror" id="exampleInputEmail3" name="topik" value="{{ old('topik') }}"  placeholder="Topik">
                                @error('topik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword4">Gambar</label> <br>
                                <input type="file" class="file-upload-default  @error('gambar') is-invalid @enderror" id="exampleInputPassword4" name="gambar" placeholder="Gambar">
                                <div class="input-group col-xs-12 ">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                @error('gambar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail3">Isi</label>
                                <textarea class="form-control  @error('isi') is-invalid @enderror" id="editor" name="isi"  placeholder="Isi">{{ old('isi') }}</textarea>
                                @error('isi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>


                              <button type="submit" class="btn btn-sm btn-primary me-2">Submit</button>
                              <a href="{{ route('posting') }}" class="btn btn-light">Cancel</a>
                        </form>
                 

                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
@endpush

    
@endsection