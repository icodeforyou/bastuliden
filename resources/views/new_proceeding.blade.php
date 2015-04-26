@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Skapa nytt protokoll</div>
                    <div class="panel-body">
                        <h2>Ange innehåll</h2>
                        <form action="/proceedings/{{ isset($proceeding) ? "edit/" . $proceeding->id : "new" }}" method="post">

                            <div class="form-group">
                                <label>Datum</label>
                                <input class="form-control" type="text" name="proceeding_date" value="{{ isset($proceeding) ? $proceeding->proceeding_date : "" }}" />
                            </div>

                            <div class="form-group">
                                <label>Protokoll</label>
                                <textarea id="contentEditable" class="form-control" rows="50" name="proceeding">{{ isset($proceeding) ? $proceeding->proceeding : "" }}</textarea>
                            </div>

                            <input type="hidden" name="_token" value="{{{ Session::token() }}}"/>

                            <button type="submit" class="btn btn-primary">Spara</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
