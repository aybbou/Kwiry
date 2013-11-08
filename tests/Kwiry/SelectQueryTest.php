<?php

namespace Kwiry\Tests;

require_once __DIR__ . '/../../src/autoload.php';

use Kwiry\SelectQuery;

/**
 * Test of SelectQuery
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

    public function testGetSQL() {
        $this->query->addField('f1')->addField('f2')
                ->addFrom('t')
                ->addWhere('f1 < 3')
                ->addOrderBy('f1');
        $actual = $this->query->getSQL();
        $expected = 'SELECT f1,f2 FROM t WHERE f1 < 3 ORDER BY f1';
        $this->assertEquals($expected, $actual);
    }

}
