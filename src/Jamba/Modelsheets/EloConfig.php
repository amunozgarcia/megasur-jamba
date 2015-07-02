<?php namespace Jamba\Modelsheets;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class EloConfig extends EloModelBase
{

    /**
     * Datos del fichero de configuración
     * @var array
     */
    protected $config;

    /**
     * Cargar el modelo de datos de el archivo de configuracion models.php
     *
     * @param array|string $model
     * @return bool
     */
    public function load($model)
    {
        //cargo el fichero de configuración
        $this->config = config("models.".$model);
        //print_r($model);
        //compruebo que viene configuración
        if ($this->config)
        {

            $this->foreignKey   = $this->config['primaryKey'];

            /**
             *
             */
            $this->table        = $this->config["table"];

            /**
             *
             */
            $this->primaryKey   = $this->config['primaryKey'];


            /**
             *
             */
            $this->fillable     = $this->config['fillable'];

            /**
             *
             */
            $this->hidden       = $this->config['hidden'];

            /**
             *
             */
            $this->timestamps   = $this->config['timestamps'];

            /**
             *
             */
            $this->dateFormat   = $this->config['dateFormat'];

            //return
            return true;
        }

        return false;
    }



    /**
     * Define a one-to-many relationship.
     *
     * @param  string  $related
     * @param  string  $foreignKey
     * @param  string  $localKey
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasMany($related, $foreignKey = null, $localKey = null)
    {
        $instance = new $related;

        $localKey = $localKey ?: $this->getKeyName();

        $foreignKey = $foreignKey ?: $instance->getForeignKey();

        return new HasMany($instance->newQuery(), $this, $instance->getTable().'.'.$foreignKey, $localKey);
    }

    /**
     * Get the default foreign key name for the model.
     *
     * @return string
     */
    public function getForeignKey()
    {
        if (empty($this->foreignKey))
            return Str::snake(class_basename($this)).'_id';

        return $this->foreignKey;
    }

    /**
     * Seteo si quiero tiempo en los updates o insert
     *
     * @param bool $set
     */
    public function setTimestamps($set=false)
    {
        $this->timestamps = $set;
    }

}