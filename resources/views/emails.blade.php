@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Alla utskick
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ämne</th>
                                        <th>Mottagare</th>
                                        <th>Skapat</th>
                                        <th>Utskickat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emails as $email)
                                        <tr>
                                            <td>{{ $email->subject }}</td>
                                            <td>{{ count($email->recipients) }} mottagare</td>
                                            <td>{{ $email->created_at }}</td>
                                            <td>{{ $email->sentout_at }}</td>
                                            <td>
                                                <a href="/emails/send/{{ $email->id }}" class="btn btn-xs btn-success">Skicka!</a>
                                                <a href="/emails/edit/{{ $email->id }}" class="btn btn-xs btn-primary">Editera</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
