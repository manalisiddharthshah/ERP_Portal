<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='departments';
    /**
     * The primaryKey associated with the Table.
     *
     * @var int
     */
    protected $primaryKey='id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['deptName','mgrNo','location'];
	/**
	* Get the user that owns the mgrNo.
	*/
    public function user(){
        return $this->belongsTo(User::class,'mgrNo','id');
    }
}
