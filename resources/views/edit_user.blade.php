@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ny medlem</div>
                <div class="panel-body">
                    <form action="/users/edit/{{{ $user->id }}}" method="post">

                        <h2>Användardata</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Namn</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Namn" value="{{ $user->name }}">
                                    {{ $errors->first("name") }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name2">Ev respektive</label>
                                    <input type="text" name="name2" class="form-control" id="name2" placeholder="Respektive" value="{{ $user->name2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-post</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Ange e-post" value="{{ $user->email }}">
                            {{ $errors->first("email") }}
                        </div>

                        <input type="hidden" name="id" value="{{{ $user->id }}}"/>
                        <input type="hidden" name="_token" value="{{{ Session::token() }}}"/>

                        <a href="/users/{{ $user->id }}" class="btn btn-default">Avbryt</a>
                        <button type="submit" class="btn btn-primary">Ändra</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
