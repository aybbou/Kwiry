<?php

namespace Kwiry;

use Kwiry\Query;

/**
 * The SQL DELETE Query Builder.
 *
 * @author Ayyoub
 */
class DeleteQuery extends Query {

    protected $where = array();

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

    public function getFrom() {
        return $this->getPart('DELETE FROM ', ',', 'tables');
    }

    public function getSQL() {
        return $this->getFrom()
                . $this->getWhere();
    }

}