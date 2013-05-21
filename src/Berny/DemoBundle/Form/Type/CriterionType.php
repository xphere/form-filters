<?php

/*
 * This file is part of the form-filters package
 *
 * (c) Berny Cantos <be@rny.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Berny\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CriterionType extends AbstractType
{
    public function getName()
    {
        return 'filter_criterion';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('field', 'choice', array('label' => false, ))
            ->add('type',  'choice', array('label' => false, ))
            ->add('value', 'text', array('label' => false, ))
        ;
    }
}
