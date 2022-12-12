@extends('adminlte::page')

@section('title', 'List Prestasi')

@section('content_header')
    <h1 class="m-0 text-dark">List Prestasi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('prestasi.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lomba</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kategori</th>
                            <th>Predikat</th>
                            <th>Tahun</th>
                            <th>Organisasi</th>
                            <th>Dokumentasi</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prestasi as $key => $pts)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$pts->nama}}</td>
                                <td>{{$pts->mahasiswa}}</td>
                                <td>{{$pts->kategori}}</td>
                                <td>{{$pts->predikat}}</td>
                                <td>{{$pts->tahun}}</td>
                                <td>{{$pts->organisasi->nama}}</td>
                                <td><img src="{{asset('storage/'.$pts->dokumentasi)}}"  width="100px"></td>
                                <td>
                                    <a href="{{route('prestasi.edit', $pts)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('prestasi.destroy', $pts)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
