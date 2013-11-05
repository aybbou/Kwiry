<?php

namespace Kwiry;

use Kwiry\Query;

/**
 * The SQL SELECT Query Builder.
 *
 * @author Ayyoub
 */
class SelectQuery extends Query {

    protected $fields = array();
    protected $groupBy = array();
    protected $orderBy = array();

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

    /**
     * Adds group by clauses to the SQL query.
     * 
     * @param string A group by clause element.
     * @return \Kwiry\SelectQuery
     */
    public function addGroupBy($groupBy) {
        $this->groupBy[] = $groupBy;
        return $this;
    }

    /**
     * Adds order by clauses to the SQL query.
     * 
     * @param string An order by clause element.
     * @return \Kwiry\SelectQuery
     */
    public function addOrderBy($orderBy) {
        $this->orderBy[] = $orderBy;
        return $this;
    }

    protected function getPart($keyword, $glue, $var) {
        return empty($this->$var) ? '' : $keyword . implode($glue, $this->$var);
    }

    public function getFieldsPart() {
        return $this->getPart('SELECT ', ',', 'fields');
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