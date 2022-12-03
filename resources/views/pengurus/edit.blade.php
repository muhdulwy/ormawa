@extends('adminlte::page')

@section('title', 'Edit Pengurus')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Pengurus</h1>
@stop

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pengurus.index') }}"> Kembali</a>
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

    <form action="{{ route('pengurus.update', $pengurus->id) }}" method="POST">
        @csrf   
        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIM:</strong>
                    <input type="text" name="NIM" class="form-control" placeholder="NIM" value="{{ old('NIM', $pengurus->NIM) }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama', $pengurus->nama) }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kelamin:</strong>
                    <select name="kelamin" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        @foreach ($kelamin as $jeniskelamin)
                             <option value="{{ $jeniskelamin }}" {{ old('kelamin', $pengurus->kelamin) == $jeniskelamin? 'selected' : '' }}>{{ $jeniskelamin}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fakultas</strong>
                    <input type="text" name="fakultas" class="form-control" placeholder="Fakultas" value="{{ old('fakultas', $pengurus->fakultas) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Periode</strong>
                    <input type="text" name="periode" class="form-control" placeholder="Periode" value="{{ old('periode', $pengurus->periode) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jabatan</strong>
                    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="{{ old('jabatan', $pengurus->jabatan) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telpon</strong>
                    <input type="number" name="telp" class="form-control" placeholder="Telpon" value="{{ old('telp', $pengurus->telp) }}">
                </div>
            </div>
                        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Organisasi:</strong>
                    <select name="organisasi_id" class="form-control">
                        <option value="">-- Pilih Organisasi --</option>
                        @foreach ($organisasi as $org)
                            <option value="{{ $org->id }}" {{ old('organisasi_id', $pengurus->org) == $org->id ? 'selected' : '' }}>{{ $org->nama }}</option>
                        @endforeach
                    </select>
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

    </script>
@endpush