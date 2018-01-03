<?php
/**
 * Created by PhpStorm.
 * User: Jlo
 * Date: 1/2/18
 * Time: 8:23 PM
 */

namespace Yoda\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Yoda\EventBundle\Entity\Event;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class Controller extends BaseController
{

    public function getSecurityContext()
    {

        return $this->container->get('security.context');

    }


    public function enforceOwnerSecurity( Event $event )
    {
        $user = $this->getUser();

        if( $user != $event->getOwner() )
        {
            throw new AccessDeniedException('You do not own this!');
        }
    }

}