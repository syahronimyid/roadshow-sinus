@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Angkatan</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('angkatan.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('angkatan') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Angkatan</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="angkatan" value="">

                                @if ($errors->has('angkatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angkatan') }}</strong>
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
