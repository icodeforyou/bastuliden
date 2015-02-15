<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="adress">Adress</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Adress" value="{{{ isset($estate->address) ? $estate->address : "" }}}">
             {{ $errors->first("address") }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="postalcode">Postnummer</label>
            <input type="text" name="postalcode" class="form-control" id="postalcode" placeholder="Postnummer" value="{{{ isset($estate->postalcode) ? $estate->postalcode : "" }}}">
            {{ $errors->first("postalcode") }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="city">Ort</label>
            <input type="text" name="city" class="form-control" id="city" placeholder="Ort" value="{{{ isset($estate->city) ? $estate->city : "" }}}">
            {{ $errors->first("city") }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="property_nbr">Fastighetsbeteckning</label>
            <input type="text" name="property_nbr" class="form-control" id="property_nbr" placeholder="Fastighetsbeteckning" value="{{{ isset($estate->property_nbr) ? $estate->property_nbr : "" }}}">
            {{ $errors->first("property_nbr") }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="connections">Välj antal anslutningar</label>
            <select class="form-control" name="connections">
                <option{{ isset($estate->connections) && $estate->connections == "1" ? " selected" : "" }} value="1">1 anslutning</option>
                <option{{ isset($estate->connections) && $estate->connections == "2" ? " selected" : "" }} value="2">2 anslutning</option>
                <option{{ isset($estate->connections) && $estate->connections == "3" ? " selected" : "" }} value="3">3 anslutning</option>
                <option{{ isset($estate->connections) && $estate->connections == "4" ? " selected" : "" }} value="4">4 anslutning</option>
            </select>
        </div>
    </div>
</div>