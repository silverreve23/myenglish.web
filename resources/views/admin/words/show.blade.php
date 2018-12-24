@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">word {{ $word->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/words') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/words/' . $word->id . '/edit') }}" title="Edit word"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('/words' . '/' . $word->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete word" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $word->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Word</th>
                                        <td>{{ $word->word }}</td>
                                    </tr>
                                    <tr>
                                        <th>Trans</th>
                                        <td>{{ $word->trans }}</td>
                                    </tr>                                   
                                    <tr>
                                        <th>Hint</th>
                                        <td>{{ $word->hint }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
