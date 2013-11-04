<?php

require_once 'SelectQuery.php';

use Ayb\Kwiry\SelectQuery;

$query = new SelectQuery();

$query->addField('name')->addOrderBy('name')->addWhere('name = "Ayyoub"')
        ->addField('age')->addWhere('age > 20')
        ->addFrom('employees');

echo $query->getSQLQuery();