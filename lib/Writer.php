<?php

namespace Sabre\VObject;

use Sabre\XML;

/**
 * iCalendar/vCard/jCal/jCard/xCal/xCard writer object.
 *
 * This object provides a few (static) convenience methods to quickly access
 * the serializers.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Writer {

    /**
     * Serializes a vCard or iCalendar object.
     *
     * @param Component $component
     * @return string
     */
    static function write(Component $component) {

        return $component->serialize();

    }

    /**
     * Serializes a jCal or jCard object.
     *
     * @param Component $component
     * @param int $options
     * @return string
     */
    static function writeJson(Component $component, $options = 0) {

        return json_encode($component, $options);

    }

    /**
     * Serializes a xCal or xCard object.
     *
     * @param Component $component
     * @return string
     */
    static public function writeXML(Component $component) {

        $writer = new XML\Writer();
        $writer->openMemory();
        $writer->setIndent(true);
        $writer->write($component->xmlSerialize());

        return $writer->outputMemory();

    }

}
