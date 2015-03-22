<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estates extends Model {

    protected $table = "estates";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo("App\\Models\\User");
    }

    public function setPropertyNbrAttribute($value)
    {
        return $this->attributes['property_nbr'] = strtoupper($value);
    }

}
