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

use Berny\DemoBundle\Form\Listener\ResetIndexesListener;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
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

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventSubscriber(new ResetIndexesListener());
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['prototype_name'] = $options['prototype_name'];
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(array(
            'filtered',
        ));
        $resolver->setDefaults(array(
            'type' => new CriterionType(),
            'allow_add' => true,
            'label' => false,
            'options' => array(
                'label' => false,
                'attr' => array(
                    'class' => 'criterion',
                ),
                'required' => false,
            ),
            'attr' => array(
                'class' => 'filter',
            ),
        ));
    }
}
