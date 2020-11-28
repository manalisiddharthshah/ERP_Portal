<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'password','userTypeId','deptId','officeId','admin','manager','tech_lead','software_engineer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
    * Get the depatment Name for the owns the deptId.
    */
    public function department(){
        return $this->belongsTo(Department::class,'deptId','id');
    }
    /**
    * Get the userType that owns the userTypeId
    */
    public function userType(){
        return $this->belongsTo(UserType::class,'userTypeId','id');
    }
    /**
    * Get the Office Name that owns the officeId
    */
    public function office(){
        return $this->belongsTo(Office::class,'officeId','id');
    }
    public function isAdmin(){
        return ($this->admin == 1);
    }
    public function isManager(){
        return ($this->manager == 1);
    }
    public function isTechLead(){
        return ($this->tech_lead == 1);
    }
    public function isSoftwareEngineer(){
        return ($this->software_engineer == 1);
    }
}
