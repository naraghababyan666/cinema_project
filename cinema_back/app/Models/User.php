<?php

namespace App\Models;

use App\Mail\LoginCode;
use App\Traits\AddEdit;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    use AddEdit;

    protected $fillable = [
        'role_id', 'is_active', 'name', 'email',
        'country_code', 'phone', 'percent'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const USER = 1; // потребитель
    const CASHIER = 2; // кассир
    const OPERATOR = 3; // оператор
    const CREATOR = 4; // правообладатель
    const ADMIN = 5; // админ
    const CINEMA = 6; // Синема


    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_id', 'id')->withDefault(['title' => '<span class="text-danger">нет данных</span>']);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * User tokens relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    /**
     * Return the country code and phone number concatenated
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->country_code.$this->phone;
    }
    public function sendEmail($code, $user)
    {
        try {
            Mail::to($user->email)->send(new LoginCode($user, $code));
        } catch (\Exception $ex) {
            return false;
        }
        return true;
    }
}
