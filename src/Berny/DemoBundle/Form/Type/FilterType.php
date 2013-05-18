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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FilterType extends AbstractType
{
    public function getName()
    {
        return 'filter';
    }

    public function getParent()
    {
        return 'collection';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'type' => new CriteriaType(),
            'allow_add' => true,
            'allow_delete' => true,
            'options' => array(
                'attr' => array(
                    'class' => 'criteria',
                ),
                'required' => false,
            ),
            'attr' => array(
                'class' => 'filter',
            ),
        ));
    }
}
