<?php
require_once("./parser/XmlObject.php");
/**
 * Created by PhpStorm.
 * User: Niklas
 * Date: 07.02.2018
 * Time: 01:08
 */

class Product extends \ecoparts\XmlObject
{
    public $name;
    public $price;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


}