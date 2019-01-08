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
                        <b>Studied words total: {{ $studied }}</b><br>
                        <br>
                        <div class="form-group {{ $errors->has('period') ? 'has-error' : ''}}">
                            <label for="period" class="control-label">{{ 'Change show period application - Period(m):' }}</label>
                            <input class="form-control" name="period" type="number" id="priority" value="{{ @$period ?? 5}}" onmouseup="setPeriod(this)" onkeyup="setPeriod(this)">
                            {!! $errors->first('period', '<p class="help-block">:message</p>') !!}
                        </div>                     
                        <div class="form-group {{ $errors->has('autochangekeylang') ? 'has-error' : ''}}">
                            <label for="autochangekeylang" class="control-label">{{ 'Set auto change keyboard language(this option is test version):' }}</label><br>
                            <input name="autochangekeylang" type="checkbox" id="autochangekeylang" {{ @$autochangekeylang ? 'checked' : ''}} onchange="setAutoChangeKeyLang(this)">
                            {!! $errors->first('autochangekeylang', '<p class="help-block">:message</p>') !!}
                        </div>                   
                        <div class="form-group {{ $errors->has('translang') ? 'has-error' : ''}}">
                            <label class="control-label">{{ 'Set word text and translate language: ' }}</label><br>
                            <select name="wordlang" id="wordlang" onchange="setWordLang(this, 'wordlang')">
                                @foreach($wordlangs as $lang)
                                    <option {{ $lang == $wordlang ? 'selected' : ''}} name="{{ $lang }}" value="{{ $lang }}">{{ $lang }}</option>
                                @endforeach
                            </select> 
                            -
                            <select name="translang" id="translang" onchange="setTransLang(this, 'translang')">
                                {{ $translang }}
                                @foreach($translangs as $trans)
                                    <option {{ $trans == $translang ? 'selected' : ''}} name="{{ $trans }}" value="{{ $trans }}">{{ $trans }}</option>
                                @endforeach
                            </select>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
