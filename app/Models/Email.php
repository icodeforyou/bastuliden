<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model {

	protected $fillable = ["email_content", "recipients", "subject", "sentout_at"];
    protected $casts = [
        "recipients" => "array",
    ];
    
}
