<?php

namespace App\DataFixtures;

use App\Entity\ApiToken;
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

        $this->createMany(User::class, 2,
            function (User $user, $count) use ($manager) {

                $user->setFirstName($this->faker->userName)
                    ->setUsername($this->faker->firstName)
                    ->setRoles(['ROLE_ADMIN'])
                    ->setPassword($this->passwordEncoder->encodePassword(
                        $user,
                        'Nightwish2416'
                    ));

                $apiToken = new ApiToken($user);
                $apiToken2 = new ApiToken($user);
                $manager->persist($apiToken);
                $manager->persist($apiToken2);

            });

        $manager->flush();
    }
}
