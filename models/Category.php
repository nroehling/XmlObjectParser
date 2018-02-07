<?php
require_once("./parser/XmlObject.php");
/**
 * Created by PhpStorm.
 * User: Niklas
 * Date: 04.02.2018
 * Time: 19:25
 * Model Class that represents a Category, it must be registered in xmlparser
 */


class Category extends \ecoparts\XmlObject
{

    public $code;
    public $shopId;
    public $parent;
    public $hasChild;
    public $name;
    public $description;
    public $colorCode;
    public $titleImagePath;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * @param mixed $shopId
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getHasChild()
    {
        return $this->hasChild;
    }

    /**
     * @param mixed $hasChild
     */
    public function setHasChild($hasChild)
    {
        $this->hasChild = $hasChild;
    }

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getColorCode()
    {
        return $this->colorCode;
    }

    /**
     * @param mixed $colorCode
     */
    public function setColorCode($colorCode)
    {
        $this->colorCode = $colorCode;
    }

    /**
     * @return mixed
     */
    public function getTitleImagePath()
    {
        return $this->titleImagePath;
    }

    /**
     * @param mixed $titleImagePath
     */
    public function setTitleImagePath($titleImagePath)
    {
        $this->titleImagePath = $titleImagePath;
    }



}