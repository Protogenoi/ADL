<?php

namespace App\DataFixtures;

use App\Entity\Clients;
use Doctrine\Common\Persistence\ObjectManager;

class ClientsFixtures extends BaseFixtures
{
    public function loadData(ObjectManager $manager)
    {


        $this->createMany(Clients::class, 10, function (Clients $client, $count) {

            $client->setTitle($this->faker->titleMale)
                ->setFirstName($this->faker->firstNameMale)
                ->setLastName($this->faker->lastName)
                ->setDob($this->faker->dateTimeThisCentury)
                ->setEmail($this->faker->email)
                ->setTitle2($this->faker->titleFemale)
                ->setFirstName2($this->faker->firstNameFemale)
                ->setLastName2($this->faker->lastName)
                ->setDob2($this->faker->dateTimeThisCentury)
                ->setEmail2($this->faker->email)
                ->setPhoneNumber(rand(447111111111,447999999999))
                ->setAltNumber(rand(447111111111,447999999999))
                ->setAddress1($this->faker->streetAddress)
                ->setAddress2($this->faker->address)
                ->setAddress3($this->faker->address)
                ->setTown($this->faker->city)
                ->setPostcode($this->faker->postcode)
                ->setAddedBy($this->faker->name)
                ->setAddedDate($this->faker->dateTimeThisMonth)
                ->setOwner('E Corp');
        });

        $manager->flush();
    }
}
