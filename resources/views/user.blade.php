@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }} {{ isset($user->name2) && strlen($user->name2) ? " & " . $user->name2 : "" }}
                    <span class="pull-right">
                        <a href="/users/edit/{{ $user->id }}" class="glyphicon glyphicon-pencil"></a>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Fastigheter</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Adress</th>
                                            <th>Fastighetsbeteckning</th>
                                            <th>Antal anslutningar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->estates as $estate)
                                            <tr>
                                                <td>{{ $estate->address }}</td>
                                                <td>{{ $estate->property_nbr }}</td>
                                                <td style="text-align: center">{{ $estate->connections }} st</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button data-toggle="modal" data-target="#estate" class="btn btn-xs btn-primary">Lägg till fastighet</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <script>
                                var mapZoom = 16,
                                    centerLat = {{{ $user->estates[0]->lat }}},
                                    centerLon = {{{ $user->estates[0]->lon }}},
                                    disableDefaultUI = true,
                                    loc = {
                                        'name': '{{{ $user->name }}}',
                                        'name2': '{{{ isset($user->name2) ? $user->name2 : "" }}}',
                                        'estates':  <?=json_encode($user->estates);?>
                                    };
                            </script>
                            <div id="map-canvas" style="height:200px"></div>

                            <p><strong>{{ $user->name }} {{ $user->name2 ? "& " . $user->name2 : "" }}</strong></p>
                            <p>{{ $user->address }}</p>
                            <p><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include("modals.add-estate")
</div>

@endsection
