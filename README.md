Kwiry
=====

This is just an experiment.

A simple SQL query builder. To start just require the file :
```php 
<?php
require_once 'SelectQuery.php';
```
Then start using the SelectQuery class :
```php 
use Ayb\Kwiry\SelectQuery;

$query = new SelectQuery();
```
You can add fields to the query :
```php 
$query->addField('name')
        ->addField('age');
```
And add from elements :
```php 
$query->addFrom('employee');
```
And finally you can get the SQL query string to use it when querying a database.
```php 
$queryString = $query->getSQLQuery();
echo $queryString;
```