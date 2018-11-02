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
 * Written by michael <michael@adl-crm.uk>, 17/10/2018 11:56
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

namespace App\Form;


use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddClientForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', ChoiceType::class, [
                'choices' => [
                    'Select...' => null,
                    'Dr' => 'Dr',
                    'Mr' => 'Mr',
                    'Mrs' => 'Mrs',
                    'Ms' => 'Ms',
                    'Miss' => 'Miss',
                    'Other' => 'Other',
                ],
            ])
            ->add('firstName')
            ->add('lastName')
            ->add('dob', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'dob_js-datepicker'],
            ])
            ->add('email')
            ->add('title2', ChoiceType::class, [
                'choices' => [
                    'Select...' => null,
                    'Dr' => 'Dr',
                    'Mr' => 'Mr',
                    'Mrs' => 'Mrs',
                    'Ms' => 'Ms',
                    'Miss' => 'Miss',
                    'Other' => 'Other',
                ],
            ])
            ->add('firstName2')
            ->add('lastName2')
            ->add('dob2', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'dob2_js-datepicker'],
            ])
            ->add('email2')
            ->add('phoneNumber')
            ->add('altNumber')
            ->add('address1')
            ->add('address2')
            ->add('address3')
            ->add('town')
            ->add('postcode')
            ->add('owner')
            ->add('User')
            ->add('addedDate', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'added_js-datepicker'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);

    }

}