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

        $this->createMany(10, 'main_users', function ($i) use ($manager) {
            $user = new User();
            $user->setUsername($this->faker->userName);
            $user->setFirstName($this->faker->firstName);
            $user->setRoles(['ROLE_ADMIN']);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user, 'engage'
            ));

            $apiToken = new ApiToken($user);
            $apiToken2 = new ApiToken($user);

            $manager->persist($apiToken);
            $manager->persist($apiToken2);

            return $user;
        });

        $manager->flush();
    }
}
