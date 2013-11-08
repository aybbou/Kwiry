<?php

namespace Kwiry;

/**
 * The base Query
 *
 * @author Ayyoub
 */
abstract class Query {

    protected $tables = array();
    protected $fields = array();

    public function addField($field) {
        $this->fields[] = $field;
        return $this;
    }

    public function addTable($table) {
        $this->tables[] = $table;
        return $this;
    }

    abstract protected function getPart($keyword, $glue, $var);

    abstract public function getSQL();

    protected function getFields() {
        return $this->getPart('SELECT ', ',', 'fields');
    }

    protected function getTables() {
        return $this->getPart(' FROM ', ',', 'tables');
    }

}