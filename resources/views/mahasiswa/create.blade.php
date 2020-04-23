@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mahasiswa</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('mahasiswa/save') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="">
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('angkatan') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Angkatan</label>

                            <div class="col-md-6">
                                <select class="form-control" name="angkatan_id">
                                    <option value=""></option>
                                    @foreach ($angkatan as $d)
                                        <option value="{{ $d->id }}">{{ $d->angkatan }}</option>
                                        {{-- <option value="{{ $d->id }}"  {{  !empty($mahasiswa->angkatan_id) ? "selected" : "" }}>{{ $d->angkatan }}</option> --}}
                                    @endforeach 
                                 </select>
                                @if ($errors->has('angkatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angkatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tanggallahir') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Tanggal Lahir</label>

                            <div class="col-md-6">
                                <input id="name" type="date" class="form-control" name="tanggallahir" value="">
                                @if ($errors->has('tanggallahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggallahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Telepon</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="telepon" value="">
                                @if ($errors->has('telepon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telepon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ URL::previous() }}" class="btn btn-warning btn-danger btn-sm"> Batal</a>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
