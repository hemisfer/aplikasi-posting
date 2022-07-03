@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        {{-- form input --}}
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ Add }}</div> --}}
                <div class="card-body">
                    <h4 class="card-title">Edit Post</h4>

                    @if (Session::get('failed'))
                        <div class="alert alert-dismissible">{{ Session::get('failed') }}</div>
                    @endif

                    <form class="forms-sample" action="{{ route('update-konfigurasi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                     
                        <input type="hidden" name="id" value="{{ $data->id }}">
                           <div class="form-group">
                            <label for="exampleInputPassword4">Gambar</label> <br>
                            <input type="file" class="file-upload-default  @error('gambar') is-invalid @enderror" id="exampleInputPassword4" name="gambar" placeholder="Gambar">
                            <div class="input-group col-xs-12 ">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            <img src="{{  asset('storage/' . $data->gambar) }}" width="200px">
                            @error('gambar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">About</label>
                            <textarea class="form-control  @error('about') is-invalid @enderror" id="editor1" name="about" placeholder="About">{{ $data->about  }}</textarea>
                            @error('about')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Contact</label>
                            <textarea class="form-control  @error('contact') is-invalid @enderror" id="editor2" name="contact"  placeholder="contact">{{ $data->contact  }}</textarea>
                            @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Hubungi Kami</label>
                            <textarea class="form-control  @error('hubungikami') is-invalid @enderror" id="editor3" name="hubungikami"  placeholder="Hubungi Kami">{{ $data->hubungikami  }}</textarea>
                            @error('hubungikami')
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    if ( typeof CKEDITOR == 'undefined' )
    {
        document.write(
            'CKEditor not found');
    }
    else
    {
        var editor = CKEDITOR.replace( 'editor1', {height: 450} );    
        CKFinder.setupCKEditor( editor, '' ) ;
    
    }
    </script>
<script>
    if ( typeof CKEDITOR == 'undefined' )
    {
        document.write(
            'CKEditor not found');
    }
    else
    {
        var editor = CKEDITOR.replace( 'editor2', {height: 450} );    
        CKFinder.setupCKEditor( editor, '' ) ;
    
    }
    </script>
<script>
    if ( typeof CKEDITOR == 'undefined' )
    {
        document.write(
            'CKEditor not found');
    }
    else
    {
        var editor = CKEDITOR.replace( 'editor3', {height: 450} );    
        CKFinder.setupCKEditor( editor, '' ) ;
    
    }
    </script>
@endpush

@endsection