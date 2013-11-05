<?php

namespace Kwiry;

/**
 * The base Query
 *
 * @author Ayyoub
 */
abstract class Query {

    protected $where = array();
    protected $from = array();

    /**
     * Adds where conditions to the SQL query.
     * 
     * @param string A where condition
     * @return \Kwiry\SelectQuery
     */
    public function addWhere($condition) {
        $this->where[] = $condition;
        return $this;
    }

    /**
     * Adds from clauses to the SQL query.
     * 
     * @param string A from caluse element.
     * @return \Kwiry\SelectQuery
     */
    public function addFrom($from) {
        $this->from[] = $from;
        return $this;
    }

    /**
     * Get a specific part of the SQL query.
     * 
     * @param string The SQL keyword of the part.
     * @param string The glue between the elements of the part.
     * @param string The variable of the part.
     * @return string The string of the part.
     */
    abstract protected function getPart($keyword, $glue, $var);

    /**
     * Get the string of the SQL query.
     * 
     * @return string the sting of the SQL query
     */
    abstract public function getSQLQuery();

    public function getWherePart() {
        return $this->getPart(' WHERE ', ' AND ', 'where');
    }

    public function getFromPart() {
        return $this->getPart(' FROM ', ',', 'from');
    }

}