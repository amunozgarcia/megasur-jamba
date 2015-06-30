<?php
/**
 * Created by PhpStorm.
 * User: aure
 * Date: 29/06/2015
 * Time: 16:15
 */

namespace Jamba\Modelsheets;


use Illuminate\Database\Eloquent\Model;

class ModelBase extends Model
{
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clientes_nuevos_canon';

    /**
     * @var string
     */
    protected $primaryKey = "CNC_EMAIL";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['CNC_EMAIL','CNC_NOMBRE','CNC_DNI'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['CNC_TOKEN'];
}