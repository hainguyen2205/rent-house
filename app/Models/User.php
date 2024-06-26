<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'avatar_url',
        'email',
        'gender_id',
        'password',
        'phone',
        'date_of_birth',
        'address',
        'status_of_account',
        'account_balance',
        'role'
    ];
    public function status()
    {
        return $this->hasOne(StatusAccount::class, 'id', 'status_of_account');
    }
    public function getRole()
    {
        return $this->hasOne(Role::class, 'id', 'role');
    }
    public function blockReason()
    {
        if ($this->status_of_account == 0) {
            return $this->hasMany(Block_User::class, 'id_user', 'id');
        }
        return null;
    }
    public function genders()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }


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
        'password' => 'hashed',
    ];
}
