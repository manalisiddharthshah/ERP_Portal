<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='tasks';
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
    protected $fillable=['taskName','taskDescription','assignTo','assignBy','startDate','endDate'];
	/**
	* Get the user that owns the assignTo
	*/
    public function assignto(){
        return $this->belongsTo(User::class,'assignTo','id');
    }
    /**
	* Get the user that owns the assignBy
	*/
    public function assignby(){
        return $this->belongsTo(User::class,'assignBy','id');
    }
}
