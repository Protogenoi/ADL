<?php

namespace App\DataFixtures;

use Doctrine\Common\Persistence\ObjectManager;

class KeyfactsEmailFixtures extends BaseFixtures
{
    public function loadData(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
