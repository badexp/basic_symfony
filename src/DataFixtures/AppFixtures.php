<?php

namespace App\DataFixtures;

use App\Entity\Test;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private const FAKE_TEST_COUNT = 5000;

    public function load(ObjectManager $manager)
    {
        $fakeTestCount = self::FAKE_TEST_COUNT;
        while($fakeTestCount--)
        {
            $test = new Test();
            $test->setTitle('Title');
            $test->setWeight($fakeTestCount);

            $manager->persist($test);
        }

        $manager->flush();
    }
}
