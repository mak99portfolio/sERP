<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable{

    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUserCompanyId(){
        return $this->company_id;
    }

    public function employee_profile(){
        return $this->hasOne('App\EmployeeProfile', 'user_id');
    }

    public function working_unit(){
        if(empty($this->employee_profile->organizational_information->working_unit)){
            return NULL;
        }
        return $this->employee_profile->organizational_information->working_unit;
    }

}
