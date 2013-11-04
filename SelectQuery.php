<?php

namespace Ayb\Kwiry;

/**
 * Description of SelectQuery
 *
 * @author Ayyoub
 */
class SelectQuery {

    private $fields = array();
    private $from = array();
    private $where = array();
    private $groupBy = array();
    private $orderBy = array();

    public function addField($field) {
        $this->fields[] = $field;
        return $this;
    }

    public function addFrom($from) {
        $this->from[] = $from;
        return $this;
    }

    public function addWhere($condition) {
        $this->where[] = $condition;
        return $this;
    }
    
    public function addGroupBy($groupBy){
        $this->groupBy[] = $groupBy;
        return $this;
    }

    public function addOrderBy($orderBy) {
        $this->orderBy[] = $orderBy;
        return $this;
    }

    private function getPart($keyword, $glue, $var) {
        if (count($this->$var) > 0) {
            return $keyword . implode($glue, $this->$var);
        }
        return '';
    }

    private function getFieldsPart() {
        return $this->getPart('SELECT ', ',', 'fields');
    }

    private function getFromPart() {
        return $this->getPart(' FROM ', ',', 'from');
    }

    private function getWherePart() {
        return $this->getPart(' WHERE ', ' AND ', 'where');
    }
    
    private function getGroupByPart() {
        return $this->getPart(' GROUP BY ', ',', 'groupBy');
    }

    private function getOrderByPart() {
        return $this->getPart(' ORDER BY ', ',', 'orderBy');
    }

    public function getSQLQuery() {
        return $this->getFieldsPart()
                . $this->getFromPart()
                . $this->getWherePart()
                . $this->getGroupByPart()
                . $this->getOrderByPart();
    }

}