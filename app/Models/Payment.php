<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

    protected $table = 'payments';

    protected $fillable = ["user_id", "amount", "signup_fee"];

    public function getAmountAttribute($amount)
    {
        return money_format('%i', $amount) . " kr";
    }

} 