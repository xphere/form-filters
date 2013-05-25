<?php

/*
 * This file is part of the form-filters package
 *
 * (c) Berny Cantos <be@rny.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Berny\DemoBundle\Form\Listener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Makes collection indexes consecutive
 */
class ResetIndexesListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SUBMIT => array('onPreSubmit', 32),
        );
    }

    public function onPreSubmit(FormEvent $event)
    {
        $data = $event->getData();
        if (is_array($data)) {
            $event->setData(array_values($data));
        }
    }
}
