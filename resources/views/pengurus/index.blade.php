@extends('adminlte::page')

@section('title', 'List Pengurus')

@section('content_header')
    <h1 class="m-0 text-dark">List Pengurus</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('pengurus.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Fakultas</th>
                            <th>Periode</th>
                            <th>Jabatan</th>
                            <th>Telpon</th>
                            <th>Organisasi</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pengurus as $key => $pgs)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$pgs->NIM}}</td>
                                <td>{{$pgs->nama}}</td>
                                <td>{{$pgs->kelamin}}</td>
                                <td>{{$pgs->fakultas}}</td>
                                <td>{{$pgs->periode}}</td>
                                <td>{{$pgs->jabatan}}</td>
                                <td>{{$pgs->telp}}</td>
                                <td>{{$pgs->organisasis}}</td>
                                <td>
                                    <a href="{{route('pengurus.edit', $pgs)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('pengurus.destroy', $pgs)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
