@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bastulidens medlemsregister</div>
                <table class="table">
                    <thead>
                        <tr>
                           <th>Namn</th>
                           <th>Adress</th>
                           <th>Fastighetsbeteckning</th>
                           <th>Betalt årsavgift</th>
                           <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->house_number }}</td>
                            <td style="text-align: center; vertical-align:middle">
                               {{ $user->signup_fee_paid ? "Ja" : "Nej" }}
                            </td>
                            <td>
                               <a href="/users/{{ $user->id }}" class="btn-xs btn btn-primary">Hantera</a>
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
