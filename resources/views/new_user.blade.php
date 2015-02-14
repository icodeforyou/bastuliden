@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ny medlem</div>
                <div class="panel-body">
                    <form action="/users/new" method="post">

                        <h2>Användardata</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Namn</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Namn" value="{{{ isset($user->name) ?: "" }}}">
                                    {{ $errors->first("name") }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name2">Namn (ev respektive)</label>
                                    <input type="text" name="name2" class="form-control" id="name2" placeholder="Respektive" value="{{{ isset($user->name2) ?: "" }}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-post</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Ange e-post" value="{{{ isset($user->email) ?: "" }}}">
                            {{ $errors->first("email") }}
                        </div>

                        <h2>Fastighet</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="adress">Adress</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Adress" value="{{{ isset($estate->address) ?: "" }}}">
                                     {{ $errors->first("address") }}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="postalcode">Postnummer</label>
                                    <input type="text" name="postalcode" class="form-control" id="postalcode" placeholder="Postnummer" value="{{{ isset($estate->postalcode) ?: "" }}}">
                                    {{ $errors->first("postalcode") }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">Ort</label>
                                    <input type="text" name="city" class="form-control" id="city" placeholder="Ort" value="{{{ isset($estate->city) ?: "" }}}">
                                    {{ $errors->first("city") }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="property_nbr">Fastighetsbeteckning</label>
                                    <input type="text" name="property_nbr" class="form-control" id="property_nbr" placeholder="Fastighetsbeteckning" value="{{{ isset($estate->property_nbr) ?: "" }}}">
                                    {{ $errors->first("property_nbr") }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="connections">Välj antal anslutningar</label>
                                    <select class="form-control" name="connections">
                                        <option value="1">1 anslutning</option>
                                        <option value="2">2 anslutning</option>
                                        <option value="3">3 anslutning</option>
                                        <option value="4">4 anslutning</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
