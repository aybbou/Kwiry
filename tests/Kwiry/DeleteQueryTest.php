<?php

namespace Kwiry\Tests;

require_once __DIR__ . '/../../src/autoload.php';

use Kwiry\DeleteQuery;

/**
 * Test of DeleteQuery
 *
 * @author Ayyoub
 */
class DeleteQueryTest extends \PHPUnit_Framework_TestCase {

    private $query;

    public function setUp() {
        $this->query = new DeleteQuery();
    }

    public function tearDown() {
        unset($this->query);
    }

    public function testGetSQL() {
        $this->query->addFrom('t')
                ->addWhere('f1 > 6');
        $actual = $this->query->getSQL();
        $expected = 'DELETE FROM t WHERE f1 > 6';
        $this->assertEquals($expected, $actual);
    }

}
