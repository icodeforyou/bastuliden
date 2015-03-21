<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "users";

    protected $fillable = [
        "email",
        "name",
        "name2",
        "email",
        "visible",
        "password"
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ["password", "remember_token"];

    public function scopeVisible($query)
    {
        return $query->whereVisible(1);
    }

    public function payments()
    {
        return $this->hasMany("App\\Models\\Payment")->orderBy("created_at", "desc");
    }

    public function estates()
    {
        return $this->hasMany("App\\Models\\Estates");
    }

    public function paidSignupFee()
    {
        return $this->hasOne("App\\Models\\Payment")->where("signup_fee", 1);
    }

    public function scopeIsAdmin($query)
    {
        return $query->whereisAdmin(1);
    }

}
