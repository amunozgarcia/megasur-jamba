<?php namespace Asp\Shop\Products;

use Jamba\Modelsheets\EloConfig;

class ProductQuality  extends EloConfig
{

    public function __construct()
    {
        $this->load("product_quality");

    }

    public function product()
    {
        return $this->hasOne('Asp\Shop\Products\Product');
    }

}