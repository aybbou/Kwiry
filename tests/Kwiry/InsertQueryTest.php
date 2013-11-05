<?php

namespace Kwiry\Tests;

require_once __DIR__ . '/../../src/autoload.php';

use Kwiry\InsertQuery;

/**
 * Description of QueryTest
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

    public function testGetFieldsPart() {
        $this->query->addField('f1')->addField('f2');
        $actual = $this->query->getFieldsPart();
        $expected = ' (f1,f2) ';
        $this->assertEquals($expected, $actual);
    }

}

?>
