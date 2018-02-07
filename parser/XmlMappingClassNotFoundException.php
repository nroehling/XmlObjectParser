<?php
/**
 * Created by PhpStorm.
 * User: Niklas
 * Date: 07.02.2018
 * Time: 02:22
 */

namespace ecoparts;


class XmlMappingClassNotFoundException extends \Exception
{
    // Die Exception neu definieren, damit die Mitteilung nicht optional ist
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        // sicherstellen, dass alles korrekt zugewiesen wird
        parent::__construct($message, $code, $previous);
    }

    // maßgeschneiderte Stringdarstellung des Objektes
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}