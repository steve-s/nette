<?php

/**
 * Test: Nette\Config\Configurator and services inheritance and overwriting.
 *
 * @author     David Grudl
 */

use Nette\Config\Configurator,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


class MyApp extends Nette\Application\Application
{
}


$configurator = new Configurator;
$configurator->setDebugMode(FALSE);
$configurator->setTempDirectory(TEMP_DIR);
$container = $configurator->addConfig('files/config.inheritance2.neon', Configurator::NONE)
	->createContainer();


Assert::type( 'MyApp', $container->getService('application') );
Assert::null( $container->getService('application')->catchExceptions );
Assert::same( 'Error', $container->getService('application')->errorPresenter );

Assert::type( 'MyApp', $container->getService('app2') );
Assert::null( $container->getService('app2')->catchExceptions );
Assert::null( $container->getService('app2')->errorPresenter );
