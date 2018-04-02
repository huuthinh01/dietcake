<?php
require_once dirname(__FILE__).'/bootstrap.php';

use PHPUnit\Framework\TestCase;

class ParamTest extends TestCase
{
    public function test_get()
    {
        $_REQUEST['foo'] = 200;
        $this->assertEquals(200, Param::get('foo'));

        $_REQUEST['foo'] = array('a', 'b');
        $this->assertEquals(array('a', 'b'), Param::get('foo'));

        $this->assertTrue(is_null(Param::get('bar')));

        $this->assertEquals('default', Param::get('bar', 'default'));
    }

    public function test_params()
    {
        $_REQUEST = array();

        $this->assertEquals(array(), Param::params());

        $_REQUEST['foo'] = 100;
        $this->assertEquals(array('foo' => 100), Param::params());
    }
}
