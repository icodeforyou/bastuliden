@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ny medlem</div>
                <div class="panel-body">
                    <h2>Användardata</h2>
                    <form action="/users/new" method="post">

                        @include("partials.forms.user")

                        <h2>Fastighet</h2>

                        @include("partials.forms.estate")

                        @if (isset($user->id))
                            <input type="hidden" name="id" value="{{{ $user->id }}}"/>
                        @endif
                        <input type="hidden" name="_token" value="{{{ Session::token() }}}"/>
                        <button type="submit" class="btn btn-default">Skapa</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
