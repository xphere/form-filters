<?php

/*
 * This file is part of the form-filters package
 *
 * (c) Berny Cantos <be@rny.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Berny\DemoBundle\DataFixtures\ORM;

use Berny\DemoBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $repo = $manager->getRepository('BernyDemoBundle:User');
        $faker = FakerFactory::create();

        for ($i = 0; $i < 128; ++$i) {
            $user = new User();
            $user->setUsername($faker->name);
            $user->setBirthdate($faker->dateTimeThisCentury);
            $user->setActive($faker->randomDigitNotNull > 4);
            $user->setMoney($faker->randomNumber(0, 100));
            $manager->persist($user);
        }

        $manager->flush();
    }
}