<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,  [
                'label' => 'Titre',
            ])
            ->add('user', EntityType::class,  [
                'class' => 'App\Entity\User',
                // 'label' => 'Assigné l\'utilisateur: ',
                'choice_label' => 'username',
                'placeholder' => '',
                'empty_data' => null,
                'required' => false,
                'expanded' => true,
                'multiple' => true,
            ])
            // ->add('user', EntityType::class,  [
            //     'class' => 'App\Entity\User',
            //     // 'label' => 'Assigné l\'utilisateur: ',
            //     'choice_label' => 'username',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
