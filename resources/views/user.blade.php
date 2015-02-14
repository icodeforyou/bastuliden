@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }} <span class="pull-right">{{ $user->house_number }}</span></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Fastigheter</h4>
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

                            <h4>Inbetalningar</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Summa</th>
                                        <th>Datum</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" style="text-align: right">
                                            <button data-toggle="modal" data-target="#betala" class="btn btn-xs btn-primary">Notera betalning</button>
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($user->payments as $payment)
                                        <tr>
                                            <td>{{ $payment->amount }}</td>
                                            <td>{{ $payment->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            @if (!$user->paidSignupFee)
                                <div class="alert alert-danger" role="alert">
                                    <strong>OBS!</strong> Har ej betalat anmälningsavgift
                                </div>
                            @endif
                            <p><strong>{{ $user->name }} {{ $user->name2 ? "& " . $user->name2 : "" }}</strong></p>
                            <p>{{ $user->address }}</p>
                            <p><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include("modals.pay")
</div>

@endsection
