<?php

namespace Yoda\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction( $firstName, $count )
    {

        $data = array(

            'count' => $count,
            'firstName' => $firstName,
            'ackbar' => 'It\'s a traaaapp!'
        );

        $json = json_encode( $data );

        //Make sure we get the correct content type header.

        $response = new Response( $json );

        $response->headers->set('Content-Type', 'application/json' );

        return $response;
    }
}
