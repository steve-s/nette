<?php

/**
 * Test: Nette\Object extension method 5.3
 *
 * @author     David Grudl
 * @phpversion 5.3
 */

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


class TestClass extends Nette\Object
{
	public $foo = 'Hello', $bar = 'World';
}


TestClass::extensionMethod('join', function(TestClass $that, $separator) {
	return $that->foo . $separator . $that->bar;
});

$obj = new TestClass;
Assert::same( 'Hello*World', $obj->join('*') );
