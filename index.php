<?php

require_once 'src/autoload.php';

//Select query
$select = Kwiry\Kwiry::create('select');

$select->addField('name')->addField('age')
        ->addFrom('employees')
        ->addWhere('age > 20');

echo $select->getSQL();
//SELECT name,age FROM employees WHERE age > 20

//Insert query
$insert = Kwiry\Kwiry::create('insert');

$insert->addInto('employees')
        ->addField('name')->addValue('Ayyoub')
        ->addField('age')->addValue('22');

echo $insert->getSQL();
//INSERT INTO employees (name,age) values (Ayyoub,22)         

//Delete query
$delete = Kwiry\Kwiry::create('delete');

$delete->addFrom('employees')
        ->addWhere('age > 60');

echo $delete->getSQL();
//DELETE FROM employees WHERE age > 60