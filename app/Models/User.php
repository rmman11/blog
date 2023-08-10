<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class User extends Authenticatable
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
      'email',
      'gender',
      'phone',
      'photo',
      'status',
      'password',
     
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


   public function getEmailVerifiedAtAttribute($value)
     {
         return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
     }


  

     public function sendPasswordResetNotification($token)
     {
         $this->notify(new ResetPassword($token));
     }

 public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function posts()  
    {  
      return $this->hasOne('App\Models\Post');  
    }  


public function getName()
{
return $this->attributes['name'];
}
public function setName($name)
{
$this->attributes['name'] = $name;
}

   
}