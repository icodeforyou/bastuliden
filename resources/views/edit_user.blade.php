@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }}</div>
                <div class="panel-body">
                    <h2>Användardata</h2>
                    <form action="/users/edit/{{{ $user->id }}}" method="post">

                        @include("partials.forms.user")

                        <input type="hidden" name="id" value="{{{ $user->id }}}"/>
                        <input type="hidden" name="_token" value="{{{ Session::token() }}}"/>

                        <a href="/users/{{ $user->id }}" class="btn btn-default">Avbryt</a>
                        <button type="submit" class="btn btn-primary">Spara</button>
                    </form>
                    <hr/>

                    <h2>Fastigheter</h2>
                    @foreach ($user->estates as $estate)
                        <form action="/estates/edit/{{{ $estate->id }}}" method="post">
                            <h4>{{ $estate->property_nbr }}</h4>

                            @include("partials.forms.estate")

                            <input type="hidden" name="user_id" value="{{{ $user->id }}}"/>
                            <input type="hidden" name="_token" value="{{{ Session::token() }}}"/>
                            <button type="submit" class="btn btn-primary">Spara</button>

                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
