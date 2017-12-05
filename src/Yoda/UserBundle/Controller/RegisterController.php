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
use Symfony\Component\HttpFoundation\Request;
use Yoda\UserBundle\Entity\User;

class RegisterController extends Controller
{

    /**
     * @Route( "/register", name="user_register")
     *
     * @Template
     */
    public function registerAction( Request $request )
    {

        // Adding default data
       $user = new User();
       $user->setUsername( 'Leia' );


        $form = $this->createFormBuilder( $user, array(
            'data_class' => 'Yoda\UserBundle\Entity\User'
        ) )
            ->add( 'username', 'text' )
            ->add( 'email', 'email' )
            ->add( 'plainPassword', 'repeated', array(
                'type' => 'password'
            ) )
            ->getform()
            ;


        $form->handleRequest( $request );

        if( $form->isValid() )
        {

            $user = $form->getData();

            $user->setPassword( $this->encodePassword(  $user, $user->getPlainPassword() ) );

            $em = $this->getDoctrine()->getManager();
            $em->persist( $user );
            $em->flush();

            $url = $this->generateUrl( 'event' );

            return $this->redirect( $url );

        }

        return array( 'form' => $form->createView() );
    }



    private function encodePassword(User $user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory' )
            ->getEncoder($user)
        ;

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
}