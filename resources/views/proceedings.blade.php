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
                                            <th>Etikett</th>
                                            <th>Datum</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">
                                                <a href="/proceedings/new">Nytt protokoll</a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($proceedings as $proceeding)
                                        <tr>
                                            <td><a href="/proceedings/view/{{ $proceeding->id }}">{{ $proceeding->label }}</a></td>
                                            <td>{{ $proceeding->proceeding_date }}</td>
                                            <td>
                                                <a href="/proceedings/edit/{{ $proceeding->id }}" class="btn btn-xs btn-success">Ändra</a>
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
