<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{

    use SoftDeletes;
    protected $guarded=['id'];
    protected $fillable = [
        'parent_department_id',
        'name',
        'description'
    ];
    public function parent()
    {
        return $this->belongsTo('App\Department', 'parent_department_id');
    }

    public function children()
    {
        return $this->hasMany('App\Department', 'parent_department_id');
    }
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
}
