<?php
/**
 * Created by PhpStorm.
 * User: Jlo
 * Date: 12/1/17
 * Time: 1:16 PM
 */

namespace Yoda\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class SecurityController extends Controller
{

    /**
     * @Route( "/login", name="login_form")
     * @Template
     */
    public function loginAction(Request $request)
    {

        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return array(
            'last_username' => $lastUsername,
            'error'         => $error,
        );

    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {

        // Not going to put anything here
        // This is never executed, symfony intercepts requests to this.
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {

        // Not going to put anything here
        // This is never executed, symfony intercepts requests to this.
    }
}