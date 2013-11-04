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

    private $query;

    public function setUp() {
        $this->query = new SelectQuery();
    }

    public function tearDown() {
        unset($this->query);
    }

    public function testGetFieldsPart() {
        $this->query->addField('f1');
        $actual = $this->query->getFieldsPart();
        $expected = 'SELECT f1';
        $this->assertEquals($expected, $actual);
    }

    public function testGetFromPart() {
        $this->query->addFrom('t1');
        $actual = $this->query->getFromPart();
        $expected = ' FROM t1';
        $this->assertEquals($expected, $actual);
    }

    public function testGetWherePart() {
        $this->query->addWhere('f1 = "value"');
        $actual = $this->query->getWherePart();
        $expected = ' WHERE f1 = "value"';
        $this->assertEquals($expected, $actual);
    }

    public function testGetGroupByPart() {
        $this->query->addGroupBy('f1');
        $actual = $this->query->getGroupByPart();
        $expected = ' GROUP BY f1';
        $this->assertEquals($expected, $actual);
    }

    public function testGetOrderByPart() {
        $this->query->addOrderBy('f1');
        $actual = $this->query->getOrderByPart();
        $expected = ' ORDER BY f1';
        $this->assertEquals($expected, $actual);
    }
    
    public function testGetSQLQuery(){
        $this->query->addField('name')->addFrom('employee')->addField('age')
                ->addWhere('age > 20')->addWhere('name = "Ayyoub"')->addOrderBy('name');
        $actual = $this->query->getSQLQuery();
        $expected = 'SELECT name,age FROM employee WHERE age > 20 AND name = "Ayyoub" ORDER BY name';
        $this->assertEquals($expected, $actual);
        $this->query = new SelectQuery();
        $this->query->addFrom('table')->addField('f1')->addField('f2')
                ->addWhere('f1 < value');
        $actual = $this->query->getSQLQuery();
        $expected = 'SELECT f1,f2 FROM table WHERE f1 < value';
        $this->assertEquals($expected, $actual);
    }

}
