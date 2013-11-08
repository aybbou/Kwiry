<?php

namespace Kwiry;

use Kwiry\Query;

/**
 * The SQL SELECT Query Builder.
 *
 * @author Ayyoub
 */
class SelectQuery extends Query {

    protected $groupBy = array();
    protected $orderBy = array();
    protected $where = array();

    public function addGroupBy($groupBy) {
        $this->groupBy[] = $groupBy;
        return $this;
    }

    public function addOrderBy($orderBy) {
        $this->orderBy[] = $orderBy;
        return $this;
    }

    public function addFrom($from) {
        return $this->addTable($from);
    }

    public function addWhere($where) {
        $this->where[] = $where;
        return $this;
    }

    protected function getWhere() {
        return $this->getPart(' WHERE ', 'AND', 'where');
    }

    protected function getPart($keyword, $glue, $var) {
        return empty($this->$var) ? '' : $keyword . implode($glue, $this->$var);
    }

    protected function getGroupBy() {
        return $this->getPart(' GROUP BY ', ',', 'groupBy');
    }

    protected function getOrderBy() {
        return $this->getPart(' ORDER BY ', ',', 'orderBy');
    }

    protected function getFrom() {
        return $this->getTables();
    }

    public function getSQL() {
        return $this->getFields()
                . $this->getFrom()
                . $this->getWhere()
                . $this->getGroupBy()
                . $this->getOrderBy();
    }

}