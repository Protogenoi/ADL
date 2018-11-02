<?php
/**
 * ------------------------------------------------------------------------
 *                               ADL CRM
 * ------------------------------------------------------------------------
 *
 * Copyright © 2018 ADL CRM All rights reserved.
 *
 * Unauthorised copying of this file, via any medium is strictly prohibited.
 * Unauthorised distribution of this file, via any medium is strictly prohibited.
 * Unauthorised modification of this code is strictly prohibited.
 *
 * Proprietary and confidential
 *
 * Written by michael <michael@adl-crm.uk>, 10/09/2018 17:51
 *
 * ADL CRM makes use of the following third party open sourced software/tools:
 *  DataTables - https://github.com/DataTables/DataTables
 *  EasyAutocomplete - https://github.com/pawelczak/EasyAutocomplete
 *  PHPMailer - https://github.com/PHPMailer/PHPMailer
 *  ClockPicker - https://github.com/weareoutman/clockpicker
 *  fpdf17 - http://www.fpdf.org
 *  summernote - https://github.com/summernote/summernote
 *  Font Awesome - https://github.com/FortAwesome/Font-Awesome
 *  Bootstrap - https://github.com/twbs/bootstrap
 *  jQuery UI - https://github.com/jquery/jquery-ui
 *  Google Dev Tools - https://developers.google.com
 *  Twitter API - https://developer.twitter.com
 *  Webshim - https://github.com/aFarkas/webshim/releases/latest
 *
 */

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

abstract class BaseFixtures extends Fixture
{
    /** @var ObjectManager */
    private $manager;

    /** @var Generator */
    protected $faker;

    private $referencesIndex = [];

    abstract protected function loadData(ObjectManager $manager);

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->faker = Factory::create();

        $this->loadData($manager);
    }

    /**
     * Create many objects at once:
     *
     *      $this->createMany(10, function(int $i) {
     *          $user = new User();
     *          $user->setFirstName('Ryan');
     *
     *           return $user;
     *      });
     *
     * @param int      $count
     * @param string   $groupName Tag these created objects with this group name,
     *                            and use this later with getRandomReference(s)
     *                            to fetch only from this specific group.
     * @param callable $factory
     */
    protected function createMany(
        int $count,
        string $groupName,
        callable $factory
    )
    {
        for ($i = 0; $i < $count; $i++) {
            $entity = $factory($i);

            if (null === $entity) {
                throw new \LogicException('Did you forget to return the entity object from your callback to BaseFixture::createMany()?');
            }

            $this->manager->persist($entity);

            // store for usage later as groupName_#COUNT#
            $this->addReference(sprintf('%s_%d', $groupName, $i), $entity);
        }
    }

    protected function getRandomReference(string $groupName)
    {
        if (!isset($this->referencesIndex[$groupName])) {
            $this->referencesIndex[$groupName] = [];

            foreach (
                $this->referenceRepository->getReferences() as $key => $ref
            ) {
                if (strpos($key, $groupName.'_') === 0) {
                    $this->referencesIndex[$groupName][] = $key;
                }
            }
        }

        if (empty($this->referencesIndex[$groupName])) {
            throw new \InvalidArgumentException(sprintf('Did not find any references saved with the group name "%s"',
                $groupName));
        }

        $randomReferenceKey
            = $this->faker->randomElement($this->referencesIndex[$groupName]);

        return $this->getReference($randomReferenceKey);
    }

    protected function getRandomReferences(string $className, int $count)
    {
        $references = [];
        while (count($references) < $count) {
            $references[] = $this->getRandomReference($className);
        }

        return $references;
    }
}