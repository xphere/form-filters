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
        $builder
            ->add('field', 'choice', array(
                'label' => false,
                'attr' => array(
                    'class' => 'criterion_field',
                ),
            ))
            ->add('type', 'choice', array(
                'label' => false,
                'attr' => array(
                    'class' => 'criterion_type',
                ),
            ))
            ->add('value', 'text', array(
                'label' => false,
                'attr' => array(
                    'class' => 'criterion_value',
                ),
            ))
        ;
    }
}
