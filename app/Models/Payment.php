<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

    protected $table = 'payments';

    public function getAmountAttribute($amount)
    {
        return money_format('%i', $amount) . " kr";
    }
} 