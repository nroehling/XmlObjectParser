<?php
/**
 * Created by PhpStorm.
 * User: Niklas
 * Date: 02.02.2018
 * Time: 17:22
 */


namespace ecoparts;

require_once("XmlMapper.php");
require_once("XmlMappingClassNotFoundException.php");


/**
 * Parses a XML and searches for registered objects
 * Class XmlParser
 * @package ecoparts
 */
class XmlParser
{
    public $document;
    //private $pathToModels;
    private $filePath;
    private $fileName;
    private $registry = [];

    function __construct($xmlPath) {
        $this->loadXmlFile($xmlPath);
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param mixed $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return mixed
     */
    public function getRegistry()
    {
        return $this->registry;
    }

    /**
     * @param mixed $registry
     */
    public function setRegistry($registry)
    {
        $this->registry = $registry;
    }

    /**
     * Loads a new XmlFile
     * @param $xmlPath
     */
    public function loadXmlFile($xmlPath) {
        $doc = new \DOMDocument();
        $doc->load($xmlPath);
        $this->document = $doc;
        $this->filePath = $xmlPath;
        $this->fileName = basename($xmlPath);
    }

    /**
     * register a Class to the XML Parser, so the parser can look for
     * @param $qualifiedClassName
     */
    public function registerMappingClass ($qualifiedClassName) {
        $reflect = new \ReflectionClass($qualifiedClassName);
        $unqualifiedClassName = $reflect->getShortName();
        $this->registry[$unqualifiedClassName] = $qualifiedClassName;
    }

    /**
     * processes the XML and searches for the registered Classes, found tags will be converted into Objects and put in the returned array
     * @return array of objects
     * @throws XmlMappingClassNotFoundException
     */
    public function processXml () {
        $tempElemList = null;
        $objects = [];
        //iterate through the registry
        foreach($this->registry as $shortName => $className) {
            //get all elements with specified className
            $tempElemList = $this->document->getElementsByTagName($shortName);
            if($tempElemList->length > 0){
                //found at least 1 elem with specified className
                //iterate the elem list
                $elems = [];
                $elemIndexName = null;
                foreach($tempElemList as $key => $value ){
                    //for each found elem map to model class.
                    //get the parents node name for indexing the models
                    $elem = $tempElemList->item($key);
                    $elemIndexName = $elem->parentNode->nodeName;
                    $object = XmlMapper::map($className, $elem->attributes);
                    //set filepath ->
                    $object->setFileName($this->fileName);
                    //set nodeContent
                    $object->setNodeContent($elem->textContent);
                    array_push($elems, $object);
                    //Name of Node:
                    // echo $tempElemList->item($key)->nodeName . "\r\n";
                }
                //add it to the associative array.
                $objects[$elemIndexName] = $elems;
            }
        }
        if(empty($objects)){
            throw new XmlMappingClassNotFoundException("No mapping class found");
        }
        return $objects;
    }

    /**
     * moves the input file to destination dir
     * destination dir must exist
     * @param $destPath
     */
    public function moveTo($destPath) {
        if(rename($this->filePath, $destPath)){
            echo sprintf("%s was moved to %s",$this->filePath,$destPath);
        }else{
            echo 'An error occurred during moving the file';
        }
    }

}