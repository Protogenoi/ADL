<?php

namespace App\DataFixtures;

use App\Entity\AegonPolicy;
use App\Entity\Clients;
use App\Entity\Policy;
use App\Entity\Timeline;
use Doctrine\Common\Persistence\ObjectManager;

class ClientsFixtures extends BaseFixtures
{
    public function loadData(ObjectManager $manager)
    {

        $this->createMany(Clients::class, 10,
            function (Clients $client, $count) use ($manager) {

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
                    ->setPhoneNumber(rand(447111111111, 447999999999))
                    ->setAltNumber(rand(447111111111, 447999999999))
                    ->setAddress1($this->faker->streetAddress)
                    ->setAddress2($this->faker->address)
                    ->setAddress3($this->faker->address)
                    ->setTown($this->faker->city)
                    ->setPostcode($this->faker->postcode)
                    ->setAddedBy($this->faker->name)
                    ->setAddedDate($this->faker->dateTimeThisMonth)
                    ->setOwner('E Corp');

                $aegon = new AegonPolicy();
                $aegon->setReference(($this->faker->creditCardNumber));
                $aegon->setAppID($this->faker->creditCardNumber);
                $aegon->setCbTerm(rand(1, 42));
                $aegon->setCommission(rand(100, 5000));
                $aegon->setCommType('Indemnity');
                $aegon->setCoverAmount(rand(1000, 500000));
                $aegon->setDrip(rand(1, 5));
                $aegon->setPremium(rand(10,60));
                $aegon->setType('LTA');
                $aegon->setTerm(rand(5, 65));
                $manager->persist($aegon);

                $timeline = new Timeline();
                $timeline->setAddedDate($this->faker->dateTime);
                $timeline->setAddedBy($this->faker->name);
                $timeline->setNotetype('ADL Alert');
                $timeline->setMessage($this->faker->paragraph);
                $timeline->setClient($client);
                $manager->persist($timeline);

                $policy = new Policy();
                $policy->setAgent($this->faker->name);
                $policy->setCloser($this->faker->name);
                $policy->setQc($this->faker->name);
                $policy->setPolicyHolder($this->faker->name);
                $policy->setInsurer($this->faker->company);
                $policy->setReference($this->faker->creditCardNumber);
                $policy->setStatus('Live');
                $policy->setSaleDate($this->faker->dateTimeThisMonth);
                $policy->setSubDate($this->faker->dateTimeThisMonth);
                $policy->setAddedDate($this->faker->dateTimeThisMonth);
                $policy->setAddedBy($this->faker->name);
                $policy->setAegonPolicy($aegon);
                $manager->persist($policy);
                $policy->setClient($client);


            });

        $manager->flush();
    }
}
