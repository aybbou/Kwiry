Kwiry
=====

This is just an experiment.

A simple SQL query builder. 
To start just require the file :
```php 
<?php
require_once 'SelectQuery.php';
```
Then start using the SelectQuery class :
```php 
use Ayb\Kwiry\SelectQuery;

$query = new SelectQuery();

$query->addField('name')
        ->addField('age');

$query->addFrom('employee');
```
You can then get the SQL query string to use it when querying a database.
```php 
$queryString = $query->getSQLQuery();
echo $queryString;
```