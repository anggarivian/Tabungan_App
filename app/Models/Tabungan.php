<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;

    public function relationToUser()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function relationToRole()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }
    public function relationUser()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
