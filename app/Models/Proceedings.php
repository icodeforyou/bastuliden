<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proceedings extends Model {

    protected $table = "proceedings";

    protected $fillable = ["proceeding", "proceeding_date", "label"];

    public function scopeLatestProtocol($query)
    {
        return $query->orderBy("proceeding_date", "desc");
    }


}
