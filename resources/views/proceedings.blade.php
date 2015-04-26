@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Alla protokoll
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Datum</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <a href="/proceedings/new">Nytt protokoll</a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($proceedings as $proceeding)
                                        <tr>
                                            <td><a href="/proceedings/view/{{ $proceeding->id }}">{{ $proceeding->id }}</a></td>
                                            <td>{{ $proceeding->proceeding_date }}</td>
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
