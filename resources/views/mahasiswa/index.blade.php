@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Mahasiswa
                    <a href="{{ url('mahasiswa/create') }}" class="btn btn-sm btn-success pull-right"> <i class="fa fa-icon fa-plus"></i> Create</a>
                </div>

                <div class="panel-body">
                    @if (session('sukses'))
                        <div class="alert alert-success">
                            {{ session('sukses') }}
                        </div>
                    @endif
                    @if (session('hapus'))
                        <div class="alert alert-danger">
                            {{ session('hapus') }}
                        </div>
                    @endif

                    @isset($mahasiswa)
                        <div class="table table-responsive">
                            <table class="table table-striped table-inverse table-responsive">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Angkatan</th>
                                        <th>Telepon</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswa as $i)
                                        <tr>
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ $i->nama }}</td>
                                            <td>{{ $i->angkatan_id }}</td>
                                            <td>{{ $i->telepon }}</td>
                                            <td>{{ $i->tanggallahir }}</td>
                                            <td>
                                                <a href="{{ url('mahasiswa/'.$i->id.'/edit') }}" class=" btn btn-primary btn-sm"><i class="fa fa-icon fa-edit" ></i></a>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ url('mahasiswa/'.$i->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" onclick="javascript: return confirm('Yakin akan di hapus?')" class="btn btn-danger"/><i class="fa fa-icon fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
