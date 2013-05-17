<?php

namespace Berny\DemoBundle\Controller;

use Berny\DemoBundle\Entity\User;
use Berny\DemoBundle\Form\DataTransformer\CriteriaModelTransformer;
use Berny\DemoBundle\Form\Type\FilterType;
use Berny\DemoBundle\Form\Type\CriteriaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $filterFactory = $this->get('form.factory');

        $filter = $this->createFormBuilder(array())
            ->setMethod('GET')
            ->add('filters', new FilterType())
            ->add('submit', 'submit')
            ->getForm()
            ->handleRequest($request)
        ;

        $queryBuilder = $this->getUserRepository()->createQueryBuilder('u');
        if ($filter->isValid()) {
            $data = $filter->getData();
        }

        return array(
            'user_list' => $queryBuilder->getQuery()->execute(),
            'filter' => $filter->createView(),
            'data' => isset($data) ? $data : null,
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
