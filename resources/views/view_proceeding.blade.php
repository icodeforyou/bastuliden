@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ $proceeding["label"] }}<br /><small>{{ $proceeding["proceeding_date"] }}</small></h3>

                    </div>
                    <div class="panel-body">
                        {!! $proceeding["proceeding"] !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include("partials.discus")
            </div>
        </div>
    </div>



@endsection
