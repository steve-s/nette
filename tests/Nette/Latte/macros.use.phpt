<?php

/**
 * Test: Nette\Latte\Engine: {use ...}
 *
 * @author     David Grudl
 */

use Nette\Latte,
	Nette\Templating\FileTemplate,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Template.inc';


class MyMacros extends Latte\Macros\MacroSet
{
	public function __construct($compiler)
	{
		parent::__construct($compiler);
		$this->addMacro('my', 'echo "ok"');
	}

	/*5.2*static function install(Nette\Latte\Compiler $compiler)
	{
		return new self($compiler);
	}*/
}


$template = new FileTemplate(__DIR__ . '/templates/use.latte');
$template->registerFilter(new Latte\Engine);

$path = __DIR__ . '/expected/' . basename(__FILE__, '.phpt');
Assert::matchFile("$path.phtml", codefix($template->compile()));
Assert::matchFile("$path.html", $template->__toString(TRUE));
