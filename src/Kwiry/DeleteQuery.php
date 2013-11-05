<?php

namespace Kwiry;

use Kwiry\Query;

/**
 * The SQL DELETE Query Builder.
 *
 * @author Ayyoub
 */
class DeleteQuery extends Query {

    protected function getPart($keyword, $glue, $var) {
        return empty($this->$var) ? '' : $keyword . implode($glue, $this->$var);
    }

    public function getFromPart() {
        return $this->getPart('DELETE FROM ', ',', 'from');
    }

    public function getSQLQuery() {
        return $this->getFromPart()
                . $this->getWherePart();
    }

}

?>
