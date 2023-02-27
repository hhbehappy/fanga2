<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification(){
        $this->notify(new VerifyEmailNotification());
    }

    public function fanza() {
        return $this->hasMany('App\Models\Fanza');
    }

    public function fanzafreememo()
    {
        return $this->hasMany(FanzaFreeMemo::class);
    }

    public function fanzareleasememo()
    {
        return $this->hasMany(FanzaReleaseMemo::class);
    }

    public function fanzaprivatememo()
    {
        return $this->hasMany(FanzaPrivateMemo::class);
    }

    public function duga() {
        return $this->hasMany('App\Models\Duga');
    }

    public function dugafreememo()
    {
        return $this->hasMany(DugaFreeMemo::class);
    }

    public function dugareleasememo()
    {
        return $this->hasMany(DugaReleaseMemo::class);
    }

    public function dugaprivatememo()
    {
        return $this->hasMany(DugaPrivateMemo::class);
    }

    public function nices() {
        return $this->hasMany('App\Models\Nice');
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
