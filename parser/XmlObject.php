<?php
/**
 * Created by PhpStorm.
 * User: Niklas
 * Date: 04.02.2018
 * Time: 16:44
 */

namespace ecoparts;

/**
 * Abstract Class XmlObject
 * @package ecoparts
 * Model need to inherit from this class to save the filename additionally.
 */
abstract class XmlObject
{
    private $fileName;
    private $nodeContent;

    /**
     * @return mixed
     */
    public function getNodeContent()
    {
        return $this->nodeContent;
    }

    /**
     * @param mixed $nodeContent
     */
    public function setNodeContent($nodeContent)
    {
        $this->nodeContent = $nodeContent;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }



}