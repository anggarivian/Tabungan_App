<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function relationToRole()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }
    public function relationTabungan()
    {
        return $this->hasOne(Tabungan::class)->withDefault();
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded=[];

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

    public static function getDataUsers(){

        $user = User::all();

        $user_filter = [];

        $no = 1;

        for($i = 0; $i < $user->count(); $i++){
            $user_filter[$i]['no'] = $no++ ;
            $user_filter[$i]['username'] = $user[$i]->username ;
            $user_filter[$i]['name'] = $user[$i]->name ;
            $user_filter[$i]['email'] = $user[$i]->email ;
            $user_filter[$i]['kontak'] = $user[$i]->kontak ;
            $user_filter[$i]['password'] = $user[$i]->password ;
            $user_filter[$i]['jenis_kelamin'] = $user[$i]->jenis_kelamin ;
        }

        return $user_filter;
    }
}
