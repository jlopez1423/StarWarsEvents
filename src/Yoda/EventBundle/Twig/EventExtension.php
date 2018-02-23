<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/22/18
 * Time: 8:46 PM
 */

namespace Yoda\EventBundle\Twig;

use Symfony\Component\Validator\Constraints\Date;
use Yoda\EventBundle\Util\DateUtil;

class EventExtension extends \Twig_Extension
{

    public function getName()
    {
        return 'event';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('ago', array($this, 'calculateAgo')),
        );
    }

    public function calculateAgo(\DateTime $dt)
    {
        return DateUtil::ago($dt);
    }
}