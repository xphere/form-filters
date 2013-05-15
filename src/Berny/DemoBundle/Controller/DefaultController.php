<?php

namespace Berny\DemoBundle\Controller;

use Berny\DemoBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $repo = $this->getUserRepository();

        return array(
            'user_list' => $repo->findAll(),
        );
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getUserRepository()
    {
        return $this->getDoctrine()->getRepository('BernyDemoBundle:User');
    }
}
