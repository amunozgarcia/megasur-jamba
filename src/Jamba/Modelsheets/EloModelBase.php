<?php
/**
 * Created by PhpStorm.
 * User: aure
 * Date: 29/06/2015
 * Time: 16:15
 */

namespace Jamba\Modelsheets;


use Illuminate\Database\Eloquent\Model;

class EloModelBase extends Model
{
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * @var string
     */
    protected $primaryKey;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     *
     * @var string
     */
    protected $foreignKey;



}