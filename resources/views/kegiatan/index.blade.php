@extends('adminlte::page')

@section('title', 'List Kegiatan')

@section('content_header')
    <h1 class="m-0 text-dark">List Kegiatan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('kegiatan.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Tahun Akademik</th>
                            <th>Organisasi</th>
                            <th>Dokumentasi</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kegiatan as $key => $kgt)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$kgt->nama}}</td>
                                <td>{{$kgt->tgl_mulai}}</td>
                                <td>{{$kgt->tgl_selesai}}</td>
                                <td>{{$kgt->thn_akademik}}</td>
                                <td>{{$kgt->organisasi->nama}}</td>
                                <td><img src="{{asset('storage/'.$kgt->dokumentasi)}}"  width="100px"></td>
                                
                                <td>
                                    <a href="{{route('kegiatan.edit', $kgt)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('kegiatan.destroy', $kgt)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
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
