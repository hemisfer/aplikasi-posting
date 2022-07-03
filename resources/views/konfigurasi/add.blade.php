@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        {{-- form input --}}
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ Add }}</div> --}}
                <div class="card-body">
                    <h4 class="card-title">Add Logo</h4>

                    @if (Session::get('failed'))
                        <div class="alert alert-dismissible">{{ Session::get('failed') }}</div>
                    @endif

                        <form class="forms-sample" action="{{ route('store-konfigurasi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                         
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
                                <label for="exampleInputName1">About</label>
                                <input type="text" class="form-control  @error('about') is-invalid @enderror" id="editor1" name="about" value="{{ old('about') }}" placeholder="About">
                                @error('about')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputName1">Contact</label>
                                <input type="text" class="form-control  @error('contact') is-invalid @enderror" id="editor2" name="contact" value="{{ old('contact') }}" placeholder="contact">
                                @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>

                            
                              <button type="submit" class="btn btn-sm btn-primary me-2">Submit</button>
                              <a href="{{ route('konfigurasi') }}" class="btn btn-light">Cancel</a>
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
      .create( document.querySelector( '#editor1' ) )
      .catch( error => {
          console.error( error );
      } );
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
@endpush
    
@endsection