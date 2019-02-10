<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 11/7/2016
 * Time: 1:25 PM
 */

namespace App\Form;


use App\Entity\Group;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GroupSelectorType extends AbstractType
{
    private $groupOptions;

    //TODO: group options in constructor
    public function __construct()
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', EntityType::class, array(
                'class' => 'App\Entity\Group',
                'choice_label' => 'name'
            ))
        ;

    }


}