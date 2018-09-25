<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixtures
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function loadData(ObjectManager $manager)
    {

        $this->createMany(User::class, 10,
            function (User $user, $count) use ($manager) {

                $user->setFirstName('Michael')
                    ->setUsername($this->faker->firstName)
                    ->setPassword($this->passwordEncoder->encodePassword(
                        $user,
                        'Nightwish2416'
                    ));

            });

        $manager->flush();
    }
}
