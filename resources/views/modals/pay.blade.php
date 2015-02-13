<div class="modal fade" id="betala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Notera betalning</h4>
            </div>
            <form action="/users/{{ $user->id }}/new-payment" method="post">
                <div class="modal-body">
                    <p>Notera en betalning på {{ $user->name }}</p>
                    <label for="amount">Summa</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="amount" />
                        <span class="input-group-addon" id="basic-addon2">kr</span>
                    </div>
                    <input type="hidden" name="_token" value="{{{ Session::token() }}}"/>
                    <input type="hidden" name="id" value="{{ $user->id }}"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
                    <button type="submit" class="btn btn-primary">Spara</button>
                </div>
            </form>
        </div>
    </div>
</div>