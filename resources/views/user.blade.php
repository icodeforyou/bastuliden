@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding:15px">
                    {{ $user->name }} {{ isset($user->name2) && strlen($user->name2) ? " & " . $user->name2 : "" }}
                    <select class="form-control pull-right interest-changer" style="width:150px; height: 25px; margin-left:10px">
                        <option value="0"{{ !$user->confirmed_interest ? " selected" : "" }}>Ej bekräftad</option>
                        <option value="1" data-url="/users/{{ $user->id }}/confirm-interest"{{ $user->confirmed_interest === 1 ? " selected" : "" }}>Bekräftat intresse</option>
                        <option value="2" data-url="/users/{{ $user->id }}/cancel-interest"{{ $user->confirmed_interest === 2 ? " selected" : "" }}>Ej längre intresserad</option>
                    </select>

                    <span class="pull-right">
                        <button class="btn btn-primary btn-xs default" onClick="window.location='/users/edit/{{ $user->id }}';">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </button>
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

                            <div>
                                <strong>{{ $user->name }} {{ $user->name2 ? "& " . $user->name2 : "" }}</strong><br />
                                @if ($user->confirmed_interest === 1)
                                    <span class="label label-success">Bekräftat fortsatt intresse - {{ $user->confirmed_interest_date }}</span>
                                @elseif ($user->confirmed_interest === 2)
                                    <span class="label label-danger">Ej längre intresserad - {{ $user->confirmed_interest_date }}</span>
                                @endif
                            </div>
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
