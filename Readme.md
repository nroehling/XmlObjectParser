# XmlObjectParser

Is a PHP library to parse Xml files and return parsed elements as an object array.

With Given XML:

```
<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<Root>
  <ShopCategories>
    <Category Code="W01" ShopID="01" ParentCat="" Name="Name here" CatDesc="Category Description" HasChild="true" ColorCode="#3C4448" TileImagePath="" />
    <Category Code="W01.01" ShopID="0101" ParentCat="W01" Name="Name here 2" CatDesc="Category Description" HasChild="false" ColorCode="" TileImagePath="" />
  </ShopCategories>
  <Products>
    <Product name="book">Content</Product>
  </Products>
</Root>
```

produces

```
[
    ['ShopCategories'] => 
                            [0] => object(Category)
                            {
                                code => "W01",
                                shopId => 01,
                                ParentCat => "",
                                Name => "Name here"
                                        .
                                        .
                                        .
                            }
                            [1] => object(Category) {...}
    ['Products'] => 
                            [0] => object(Product)  
                            {
                                nodeContent => "Content", ...
                            }
]
```

### Prerequisites

Simply create a Model Class like ``Product.php`` or ``Category.php`` and let them extend ``\ecoparts\XmlObject``.

The Properties of the Model need to be public because they are dynamically populated.

``Product.php``
```

class Product extends \ecoparts\XmlObject
{
    public $name;
    public $price;
}

```

## Example

```php
<?php
require("./parser/XmlParser.php");
require("./models/Category.php");
require("./models/Product.php");

$xml = "xml/categories.xml";
$xmlParser = new ecoparts\XmlParser($xml);
$xmlParser->registerMappingClass("Category");
$xmlParser->registerMappingClass("Product");

echo '<pre>' . var_dump($xmlParser->processXml()) . '</pre>';
```

## TODO
- Refactor the require and require_once statements.
- Ability to parse nested XML Elements like:

```
<Product>
    <title>Exampletitle</title>
    <price>11,99</price>
</Product>
```
