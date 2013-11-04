<?php

namespace Ayb\Kwiry\Tests;

require_once __DIR__ . '/../SelectQuery.php';

use Ayb\Kwiry\SelectQuery;

/**
 * Description of SelectQueryTest
 *
 * @author Ayyoub
 */
class SelectQueryTest extends \PHPUnit_Framework_TestCase {

    public function testGetFieldsPart() {
        $query = new SelectQuery();
        $query->addField('f1');
        $actual = $query->getFieldsPart();
        $expected = 'SELECT f1';
        $this->assertEquals($expected, $actual);
    }

    public function testGetFromPart() {
        $query = new SelectQuery();
        $query->addFrom('t1');
        $actual = $query->getFromPart();
        $expected = ' FROM t1';
        $this->assertEquals($expected, $actual);
    }

    public function testGetWherePart() {
        $query = new SelectQuery();
        $query->addWhere('f1 = "value"');
        $actual = $query->getWherePart();
        $expected = ' WHERE f1 = "value"';
        $this->assertEquals($expected, $actual);
    }

    public function testGetGroupByPart() {
        $query = new SelectQuery();
        $query->addGroupBy('f1');
        $actual = $query->getGroupByPart();
        $expected = ' GROUP BY f1';
        $this->assertEquals($expected, $actual);
    }

    public function testGetOrderByPart() {
        $query = new SelectQuery();
        $query->addOrderBy('f1');
        $actual = $query->getOrderByPart();
        $expected = ' ORDER BY f1';
        $this->assertEquals($expected, $actual);
    }
    
    public function testGetSQLQuery(){
        $query = new SelectQuery();
        $query->addField('name')->addFrom('employee')->addField('age')
                ->addWhere('age > 20')->addWhere('name = "Ayyoub"')->addOrderBy('name');
        $actual = $query->getSQLQuery();
        $expected = 'SELECT name,age FROM employee WHERE age > 20 AND name = "Ayyoub" ORDER BY name';
        $this->assertEquals($expected, $actual);
        
        $query2 = new SelectQuery();
        $query2->addFrom('table')->addField('f1')->addField('f2')
                ->addWhere('f1 < value');
        $actual2 = $query2->getSQLQuery();
        $expected2 = 'SELECT f1,f2 FROM table WHERE f1 < value';
        $this->assertEquals($expected2, $actual2);
    }

}
