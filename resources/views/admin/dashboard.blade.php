@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        Your application's dashboard.
                        Change show period application:
                        <div class="form-group {{ $errors->has('period') ? 'has-error' : ''}}">
                            <label for="period" class="control-label">{{ 'Period(m)' }}</label>
                            <input class="form-control" name="period" type="number" id="priority" value="{{ @$period ?? 5}}" onmouseup="setPeriod(this)">
                            {!! $errors->first('period', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
