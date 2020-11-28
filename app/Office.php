<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='offices';
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
    protected $fillable=['officeName','location'];
}