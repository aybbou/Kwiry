<?php

namespace Kwiry;

use Kwiry\Query;

/**
 * The SQL INSERT Query Builder.
 *
 * @author Ayyoub
 */
class InsertQuery extends Query {

    protected $fields = array();
    protected $values = array();

    /**
     * Adds fields to the SQL query.
     * 
     * @param string A filed to be added to the query
     * @return \Kwiry\SelectQuery
     */
    public function addField($field) {
        $this->fields[] = $field;
        return $this;
    }

    public function addValue($value) {
        $this->values[] = $value;
        return $this;
    }

    protected function getPart($keyword, $glue, $var) {
        return empty($this->$var) ? '' : $keyword . implode($glue, $this->$var);
    }

    public function getFieldsPart() {
        $part = $this->getPart(' (', ',', 'fields');
        return $part == '' ? '' : $part . ') ';
    }

    public function getValuesPart() {
        return $this->getPart(' values (', ',', 'values') . ') ';
    }

    public function getFromPart() {
        return $this->getPart('INSERT INTO ', ',', 'from');
    }

    public function getSQLQuery() {
        return $this->getFromPart()
                . $this->getFieldsPart()
                . $this->getValuesPart();
    }

}

?>
