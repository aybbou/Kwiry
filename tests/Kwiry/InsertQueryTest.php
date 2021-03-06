<?php

namespace Kwiry\Tests;

require_once __DIR__ . '/../../src/autoload.php';

use Kwiry\InsertQuery;

/**
 * Test of InsertQuery
 *
 * @author Ayyoub
 */
class InsertQueryTest extends \PHPUnit_Framework_TestCase {

    private $query;

    public function setUp() {
        $this->query = new InsertQuery();
    }

    public function tearDown() {
        unset($this->query);
    }

    public function testGetSQL() {
        $this->query->addInto('t')
                ->addField('f1')->addValue('v1')
                ->addField('f2')->addValue('v2');
        $actual = $this->query->getSQL();
        $expected = 'INSERT INTO t (f1,f2)  values (v1,v2) ';
        $this->assertEquals($expected, $actual);
    }

}
