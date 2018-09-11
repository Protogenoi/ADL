<?php

namespace App\DataFixtures;

use App\Entity\Policy;
use Doctrine\Common\Persistence\ObjectManager;

class PolicyFixtures extends BaseFixtures
{
    public function loadData(ObjectManager $manager)
    {

        $this->createMany(Policy::class, 10, function (Policy $policy, $count) {

            $policy->setAgent($this->faker->name)
                ->setCloser($this->faker->name)
                ->setQc($this->faker->name)
                ->setPolicyHolder($this->faker->name)
                ->setInsurer($this->faker->company)
                ->setReference($this->faker->creditCardNumber)
                ->setStatus('Live')
                ->setSaleDate($this->faker->dateTimeThisMonth)
                ->setSubDate($this->faker->dateTimeThisMonth)
                ->setAddedDate($this->faker->dateTimeThisMonth)
                ->setClient(40)
                ->setAddedBy($this->faker->name);


        });

        $manager->flush();
    }
}
