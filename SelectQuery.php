<?php

namespace Ayb\Kwiry;

/**
 * A simple PHP SQL Query Builder.
 *
 * @author Ayyoub
 */
class SelectQuery {

    private $fields = array();
    private $from = array();
    private $where = array();
    private $groupBy = array();
    private $orderBy = array();

    /**
     * Adds fields to the SQL query.
     * 
     * @param string A filed to be added to the query
     * @return \Ayb\Kwiry\SelectQuery
     */
    public function addField($field) {
        $this->fields[] = $field;
        return $this;
    }

    /**
     * Adds from clauses to the SQL query.
     * 
     * @param string A from caluse element.
     * @return \Ayb\Kwiry\SelectQuery
     */
    public function addFrom($from) {
        $this->from[] = $from;
        return $this;
    }

    /**
     * Adds where conditions to the SQL query.
     * 
     * @param string A where condition
     * @return \Ayb\Kwiry\SelectQuery
     */
    public function addWhere($condition) {
        $this->where[] = $condition;
        return $this;
    }

    /**
     * Adds group by clauses to the SQL query.
     * 
     * @param string A group by clause element.
     * @return \Ayb\Kwiry\SelectQuery
     */
    public function addGroupBy($groupBy) {
        $this->groupBy[] = $groupBy;
        return $this;
    }

    /**
     * Adds order by clauses to the SQL query.
     * 
     * @param string An order by clause element.
     * @return \Ayb\Kwiry\SelectQuery
     */
    public function addOrderBy($orderBy) {
        $this->orderBy[] = $orderBy;
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
    private function getPart($keyword, $glue, $var) {
        return empty($this->$var) ? '' : $keyword . implode($glue, $this->$var);
    }

    public function getFieldsPart() {
        return $this->getPart('SELECT ', ',', 'fields');
    }

    public function getFromPart() {
        return $this->getPart(' FROM ', ',', 'from');
    }

    public function getWherePart() {
        return $this->getPart(' WHERE ', ' AND ', 'where');
    }

    public function getGroupByPart() {
        return $this->getPart(' GROUP BY ', ',', 'groupBy');
    }

    public function getOrderByPart() {
        return $this->getPart(' ORDER BY ', ',', 'orderBy');
    }

    /**
     * Get the string of the SQL query.
     * 
     * @return string the sting of the SQL query
     */
    public function getSQLQuery() {
        return $this->getFieldsPart()
                . $this->getFromPart()
                . $this->getWherePart()
                . $this->getGroupByPart()
                . $this->getOrderByPart();
    }

}