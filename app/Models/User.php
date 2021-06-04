<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitoylg\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\District;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected static $logOnlyDirty = true;

    protected static $logAttributes = ['name','email','phone','cnic','admin_id','role_id'];

    protected static $ignoreChangedAttributes = ['password'];

    protected $fillable = [
        'name',
        'cnic',
        'phone',
        'email',
        'department',
        'position',
        'password',
        'admin_id',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $logName = 'User';

    protected static $recordEvents = ['created','updated','deleted'];

      public function getDescriptionForEvent(string $eventName): string
      {
        return "User {$eventName} ";
      }
      protected static $submitEmptyLogs = false;


      public function banks(){
       return $this->hasMany(User::class);
      }
}
