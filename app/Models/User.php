<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements  HasName
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verified_at',
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



    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function works()
    {
        return $this->hasMany(WorkProvider::class);
    }
   
    public function getFilamentName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken');
    }
}
