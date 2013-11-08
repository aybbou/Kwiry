<?php

namespace Kwiry;

use Kwiry\SelectQuery;
use Kwiry\InsertQuery;
use Kwiry\DeleteQuery;

/**
 * The facetory of all Queries.
 *
 * @author Ayyoub
 */
abstract class Kwiry {

    public static function create($query) {

        $query = strtolower($query);
        switch ($query) {
            case 'select':
                return new SelectQuery();
            case 'delete':
                return new DeleteQuery();
            case 'insert':
                return new InsertQuery();
            default :
                throw new \Exception('Query not known !');
        }
    }

}
