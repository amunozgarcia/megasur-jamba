<?php namespace Asp\Shop\Products;

use Jamba\Modelsheets\EloConfig;

class Product extends EloConfig
{
    /**
     *
     */
    public function __construct()
    {
        $this->load("product");
    }

    /**
     * @return mixed
     */
    public function get_product_quality()
    {
        return $this->hasMany('Asp\Shop\Products\ProductQuality')
            -> join(
                config("models.quality.table"),
                config("models.product_quality.table").'.'.config("models.product_quality.fillable")[0],
                '=',
                config("models.quality.table").'.'.config("models.quality.primaryKey")
            )
            -> join(
                config("models.quality_valor.table"),
                config("models.quality.table").'.'.config("models.quality.primaryKey"),
                '=',
                config("models.quality_valor.table").'.'.config("models.quality_valor.primaryKey")
            );
    }


}