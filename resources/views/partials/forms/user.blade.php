<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Namn</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Namn" value="{{{ isset($user->name) ? $user->name : "" }}}">
            {{ $errors->first("name") }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name2">Ev respektive</label>
            <input type="text" name="name2" class="form-control" id="name2" placeholder="Respektive" value="{{{ isset($user->name2) ? $user->name2 : "" }}}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <label for="email">E-post</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Ange e-post" value="{{{ isset($user->email) ? $user->email : "" }}}">
            {{ $errors->first("email") }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="business"{{ isset($user->business) && $user->business ? " checked" : "" }}> Är ett företag
                </label>
            </div>
        </div>
    </div>
</div>
