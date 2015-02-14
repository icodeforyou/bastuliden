@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bastulidens medlemsregister</div>
                <table class="table users-table">
                    <thead>
                        <tr>
                           <th>Namn</th>
                           <th>E-post</th>
                           <th>Antal fastigheter</th>
                           <th>Betalt årsavgift</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr onClick="window:location='/users/{{ $user->id }}';" style="cursor:pointer">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td style="text-align: center">{{ count($user->estates) }}</td>
                            <td style="text-align: center; vertical-align:middle">
                                @if ($user->paidSignupFee)
                                    <span class="label label-success">Ja</span>
                                @else
                                    <span class="label label-default">Nej</span>
                                @endif
                            </td>
                        </tr>
                   @endforeach
                   </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
