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
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Namn">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name2">Namn (ev respektive)</label>
                                    <input type="text" name="name2" class="form-control" id="name2" placeholder="Respektive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-post</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Ange e-post">
                        </div>

                        <h2>Fastighet</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="adress">Adress</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Adress">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="postalcode">Postnummer</label>
                                    <input type="text" name="postalcode" class="form-control" id="postalcode" placeholder="Postnummer">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">Ort</label>
                                    <input type="text" name="city" class="form-control" id="city" placeholder="Ort">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="property_nbr">Fastighetsbeteckning</label>
                                    <input type="text" name="property_nbr" class="form-control" id="property_nbr" placeholder="Fastighetsbeteckning">
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
                        <input type="hidden" name="_token" value="{{{ Session::token() }}}"/>
                        <button type="submit" class="btn btn-default">Skapa</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
