<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;


require_once __DIR__.'/app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope( 'request' );
$container->set( 'request', $request );

//All the set up is done!


$templating = $container->get ( 'templating' );

echo $templating->render(
    'EventBundle:Default:index.html.twig',
    array( 'name' => 'Vader', 'count' => 3 )
);