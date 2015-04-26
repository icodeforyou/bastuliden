@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Protokoll för datum: {{ $proceeding["proceeding_date"] }}</div>
                    <div class="panel-body">
                        {!! $proceeding["proceeding"] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
