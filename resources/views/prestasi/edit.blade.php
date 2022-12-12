@extends('adminlte::page')

@section('title', 'Edit Prestasi')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Prestasi</h1>
@stop

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('prestasi.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Input gagal.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf   
        @method('PUT')

        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Lomba:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lomba" value="{{ old('nama', $prestasi->nama) }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Mahasiswa:</strong>
                    <input type="text" name="mahasiswa" class="form-control" placeholder="Nama Mahasiswa" value="{{ old('mahasiswa', $prestasi->mahasiswa) }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategori</strong>
                    <input type="text" name="kategori" class="form-control" placeholder="Kategori" value="{{ old('kategori', $prestasi->kategori) }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Predikat:</strong>
                    <select name="predikat" class="form-control">
                        <option value="">-- Pilih Predikat --</option>
                        @foreach ($predikat as $prdkt)
                             <option value="{{ $prdkt }}" {{ old('predikat', $prestasi->predikat) == $prdkt? 'selected' : '' }}>{{ $prdkt}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun</strong>
                    <input type="text" name="tahun" class="form-control" placeholder="Tahun" value="{{ old('tahun', $prestasi->tahun) }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Organisasi:</strong>
                    <select name="organisasi_id" class="form-control">
                        <option value="">-- Pilih Organisasi --</option>
                        @foreach ($organisasi as $org)
                            <option value="{{ $org->id }}" {{ old('organisasi_id', $prestasi->organisasi_id) == $org->id ? 'selected' : '' }}>{{ $org->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div> 

            <div class="col-xs-12 col-sm-5 col-md-12">
                <div class="form-group">

                    <label class="form-label" for="dokumentasi">Dokumentasi</label>
                    <input type="hidden" name="oldImage" value="{{$prestasi->dokumentasi}}">

                    @if ($prestasi->dokumentasi)
                        <img src="{{asset('storage/'.$prestasi->dokumentasi)}}" class="img-preview img-fluid mb-3 col-sm-3 d-block" > 
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-3" >                        
                    @endif

                    <input type="file" class="form-control" id="dokumentasi" name="dokumentasi" onchange="previewImage()" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

        function previewImage() {        
            const image = document.querySelector('#dokumentasi');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }

        }


    </script>
@endpush