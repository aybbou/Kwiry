<?php

namespace Kwiry;

use Kwiry\Query;

/**
 * The SQL INSERT Query Builder.
 *
 * @author Ayyoub
 */
class InsertQuery extends Query {

    protected $values = array();

    public function addValue($value) {
        $this->values[] = $value;
        return $this;
    }

    public function addInto($into) {
        return $this->addTable($into);
    }

    protected function getPart($keyword, $glue, $var) {
        return empty($this->$var) ? '' : $keyword . implode($glue, $this->$var);
    }

    protected function getFields() {
        $part = $this->getPart(' (', ',', 'fields');
        return $part == '' ? '' : $part . ') ';
    }

    protected function getValues() {
        return $this->getPart(' values (', ',', 'values') . ') ';
    }

    protected function getInto() {
        return $this->getPart('INSERT INTO ', ',', 'tables');
    }

    public function getSQL() {
        return $this->getInto()
                . $this->getFields()
                . $this->getValues();
    }

}
