<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends BaseFixtures
{
    public function loadData(ObjectManager $manager)
    {

        $this->createMany(User::class, 10,
            function (User $user, $count) use ($manager) {

                $user->setFirstName('Michael')
                    ->setUsername($this->faker->firstName);

            });

        $manager->flush();
    }
}
