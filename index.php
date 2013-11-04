<?php
require_once 'SelectQuery.php';

use Ayb\Kwiry\SelectQuery;

$query = new SelectQuery();

$query->addField('name')
        ->addField('age');

$query->addFrom('employee');

$query->addWhere('name = "Ayyoub"')
        ->addWhere('age < 20');

$query->addOrderBy('name');

echo $query->getSQLQuery();