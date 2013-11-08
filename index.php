<?php

require_once 'src/autoload.php';

$query = Kwiry\Kwiry::create('select');

$query->addField('name')
        ->addField('age')
        ->addFrom('employees')
        ->addWhere('age > 20')
        ;

echo $query->getSQL();
        
