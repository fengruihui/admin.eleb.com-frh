<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends User{
    use Notifiable;
    use HasRoles;
    protected $guard_name='web';
    protected $fillable=['name','email','password'];
}
