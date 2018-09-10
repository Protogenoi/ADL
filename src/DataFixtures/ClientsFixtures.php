<?php

namespace App\DataFixtures;

use App\Entity\Clients;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ClientsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $client = new Clients();
        $client->setTitle('Mr')
            ->setFirstName('Michael')
            ->setLastName('Owen')
            ->setDob(\DateTime::createFromFormat('Y-m-d', '1987-02-08'))
            ->setPhoneNumber('07401434619')
            ->setEmail('michael@adl-crm.uk')
            ->setAddress1('12 Clos Y Cwm')
            ->setTown('Pontardawe')
            ->setPostcode('SA8 4NA')
            ->setAddedBy('ADL')
            ->setAddedDate(\DateTime::createFromFormat('Y-m-d', '2018-09-10'))
            ->setOwner('E Corp');

        $manager->persist($client);
        $manager->flush();
    }
}
