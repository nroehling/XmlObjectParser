<?php
/**
 * Created by PhpStorm.
 * User: Niklas
 * Date: 02.02.2018
 * Time: 17:52
 */

namespace ecoparts;

/**
 * Maps the Objects found from the parser to Php Objects
 * Class XmlMapper
 * @package ecoparts
 */
class XmlMapper
{

    /**
     * maps the xml tags to model objects
     * Model Object Attributes needs to be the same name than the xml attributes
     * @param $qualifiedClassName
     * @param $xmlAttributes
     * @return mappedObject
     */
    public static function map($qualifiedClassName, $xmlAttributes) {
        $reflection = new \ReflectionClass($qualifiedClassName);
        $mappedObject = $reflection->newInstanceWithoutConstructor();
        $props = $reflection->getProperties();
        //iterate over found xml attr.
        foreach ($xmlAttributes as $attribute) {
            //iterate over props from class
            foreach ($props as $prop){
                //if prop and xml attr are the same, map it
                if(strcasecmp($prop->getName(), $attribute->name) == 0){
                    //echo "<pre>Mapping " . $prop->getName() . " to " . $attribute->name."</pre>";
                    $mappedObject->{$prop->getName()} = $attribute->value;
                }
            }
        }
        //var_dump($mappedObject);
        return $mappedObject;
    }

}