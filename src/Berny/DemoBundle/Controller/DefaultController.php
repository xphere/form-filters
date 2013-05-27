<?php

namespace Berny\DemoBundle\Controller;

use Berny\DemoBundle\Form\Type\FilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $userForm = $this->createFormBuilder()
            ->add('id', 'integer')
            ->add('username', 'text')
            ->add('birthdate', 'birthday')
            ->add('active', 'checkbox')
            ->add('money', 'integer')
            ->getForm()
        ;

        $filter = $this->createFormBuilder(array())
            ->setMethod('GET')
            ->add('filters', new FilterType(), array(
                'filtered' => $userForm,
            ))
            ->add('submit', 'submit')
            ->getForm()
            ->handleRequest($request)
        ;

        $queryBuilder = $this->getUserRepository()->createQueryBuilder('u');
        if ($filter->isValid()) {
            // TODO: Process form and add criteria to query
        }

        return array(
            'user_list' => $queryBuilder->getQuery()->execute(),
            'filter' => $filter->createView(),
        );
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getUserRepository()
    {
        return $this->getDoctrine()->getRepository('BernyDemoBundle:User');
    }
}
