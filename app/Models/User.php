<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\user_address;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'f_name',
        'l_name',
        'email',
        'phone',
        'dob',
        'gender',
        'facebook',
        'tweeter',
        'insta',
        'linkdin',
        'occupation',
        'profile_image',
        'profile_image_url',
        'password',
        "stripe_id",
        "pm_type",
        "pm_last_four",
        'is_email_verified',
        'phone_verified',
        'status',      
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function verifcation_code()
    {
        return $this->hasOne(verifcation_code::class, 'user_id');
    }
    public function user_address()
    {
        return $this->hasmany(user_address::class, 'user_id');
    }

    public function Orders()
    {
        return $this->hasmany(Order::class, 'user_id');
    }
    public function Credit_Card()
    {
        return $this->hasmany(Credit_Card::class, 'user_id');
    }
}
