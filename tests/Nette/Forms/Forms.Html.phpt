<?php

/**
 * Test: Nette\Forms and Html.
 *
 * @author     David Grudl
 */

use Nette\Forms\Form,
	Nette\Utils\Html,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


$form = new Form;
$form->addText('input', Html::el('b')->setText('Strong text.'));

Assert::match(<<<EOD
%A%
	<th><label for="frm-input"><b>Strong text.</b></label></th>
%A%
EOD
, $form->__toString(TRUE));
