<div class="modal fade" id="estate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lägg till fastighet</h4>
            </div>
            <form action="/estates/create" method="post">
                <div class="modal-body">

                    @include("partials.forms.estate")

                    <input type="hidden" name="_token" value="{{{ Session::token() }}}"/>
                    <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
                    <button type="submit" class="btn btn-primary">Spara</button>
                </div>
            </form>
        </div>
    </div>
</div>