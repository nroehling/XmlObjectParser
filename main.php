<?php
require("./parser/XmlParser.php");
require("./models/Category.php");
require("./models/Product.php");

$xml = "xml/categories.xml";
$xmlParser = new ecoparts\XmlParser($xml);
$xmlParser->registerMappingClass("Category");
$xmlParser->registerMappingClass("Product");

echo '<pre>' . var_dump($xmlParser->processXml()) . '</pre>';

//$xmlParser->moveTo("xml_done/" . $xmlParser->getFileName());