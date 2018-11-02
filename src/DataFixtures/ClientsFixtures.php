<?php

namespace App\DataFixtures;

use App\Entity\AegonPolicy;
use App\Entity\Clients;
use App\Entity\KeyfactsEmails;
use App\Entity\Policy;
use App\Entity\SmsInbound;
use App\Entity\Timeline;
use App\Entity\Uploads;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ClientsFixtures extends BaseFixtures implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {

        $this->createMany(10, 'main_articles',
            function ($count) use ($manager) {
                $client = new Clients();
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
                    ->setUser($this->getRandomReference('main_users'))
                    ->setOwner('E Corp');

                return $client;

//                for ($i = 0; $i < 5; $i++) {
//
//                    $aegon = new AegonPolicy();
//                    $aegon->setReference(($this->faker->creditCardNumber));
//                    $aegon->setAppID($this->faker->creditCardNumber);
//                    $aegon->setCbTerm(rand(1, 42));
//                    $aegon->setCommission(rand(100, 5000));
//                    $aegon->setCommType('Indemnity');
//                    $aegon->setCoverAmount(rand(1000, 500000));
//                    $aegon->setDrip(rand(1, 5));
//                    $aegon->setPremium(rand(10, 60));
//                    $aegon->setType('LTA');
//                    $aegon->setTerm(rand(5, 65));
//                    $manager->persist($aegon);
//
//                    $timeline = new Timeline();
//                    $timeline->setAddedDate($this->faker->dateTime);
//                    $timeline->setAddedBy($this->faker->name);
//                    $timeline->setNotetype('ADL Alert');
//                    $timeline->setMessage($this->faker->paragraph);
//                    $timeline->setClient($client);
//                    $manager->persist($timeline);
//
//                    $uploads = new Uploads();
//                    $uploads->setAddedBy($this->faker->name);
//                    $uploads->setAddedDate($this->faker->dateTime);
//                    $uploads->setSize(rand(10, 500));
//                    $uploads->setFile($this->faker->fileExtension);
//                    $uploads->setFileName('James closer call recording.wav');
//                    $uploads->setType('Closer call recording');
//                    $uploads->setClient($client);
//                    $manager->persist($uploads);
//
//
//                    $policy = new Policy();
//                    $policy->setAgent($this->faker->name);
//                    $policy->setCloser($this->faker->name);
//                    $policy->setQc($this->faker->name);
//                    $policy->setPolicyHolder($this->faker->name);
//                    $policy->setInsurer($this->faker->company);
//                    $policy->setReference($this->faker->creditCardNumber);
//                    $policy->setStatus('Live');
//                    $policy->setSaleDate($this->faker->dateTimeThisMonth);
//                    $policy->setSubDate($this->faker->dateTimeThisMonth);
//                    $policy->setAddedDate($this->faker->dateTimeThisMonth);
//                    $policy->setAddedBy($this->faker->name);
//                    $policy->setAegonPolicy($aegon);
//                    $manager->persist($policy);
//                    $policy->setClient($client);
//
//
//                    $keyfactsEmail = new KeyfactsEmails();
//                    $keyfactsEmail->setAddedDate($this->faker->dateTime)
//                        ->setAddedBy($this->faker->name)
//                        ->setEmail($this->faker->email);
//                    $manager->persist($keyfactsEmail);
//
//                    $smsinbound = new SmsInbound();
//                    $smsinbound->setAddedDate($this->faker->dateTime)
//                        ->setType('Delivered')
//                        ->setClient($client)
//                        ->setPhone(rand(447111111111, 447999999999))
//                        ->setMessage('SMS delivered')
//                        ->setAddedDate($this->faker->dateTime);
//                    $manager->persist($smsinbound);
//
//                    $failedSMS = new SmsInbound();
//                    $failedSMS->setAddedDate($this->faker->dateTime)
//                        ->setType('Failed')
//                        ->setClient($client)
//                        ->setPhone(rand(447111111111, 447999999999))
//                        ->setMessage('SMS failed')
//                        ->setAddedDate($this->faker->dateTime);
//                    $manager->persist($failedSMS);
//
//                    $messSMS = new SmsInbound();
//                    $messSMS->setAddedDate($this->faker->dateTime)
//                        ->setType('Response')
//                        ->setClient($client)
//                        ->setPhone(rand(447111111111, 447999999999))
//                        ->setMessage('SMS Response')
//                        ->setAddedDate($this->faker->dateTime);
//                    $manager->persist($messSMS);
//
//                }


            });

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixture::class,
        );
    }
}
