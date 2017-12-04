<?php
/**
 * Created by PhpStorm.
 * User: jlopez
 * Date: 12/4/17
 * Time: 1:08 PM
 */

namespace Yoda\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class RegisterController extends Controller
{

    /**
     * @Route( "/register", name="user_register")
     *
     * @Template
     */
    public function registerAction()
    {

        $form = $this->createFormBuilder()
            ->add( 'username', 'text' )
            ->add( 'email', 'text')
            ->add( 'password', 'password' )
            ->getform()
            ;

        // todo - render a template

        return array( 'form' => $form );
    }
}