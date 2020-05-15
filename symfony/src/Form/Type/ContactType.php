<?php

// src/Form/Type/ContactType.php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Form\Model\Contact;

class ContactType extends AbstractType
{
    /**
     * On va ici construire le formulaire en ajoutant les champs un par un
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // Le champ subject est une liste déroulante
            ->add('subject', ChoiceType::class, [
                'choices'  => [
                    // L'option Sujet A aura comme valeur "a"
                    'Sujet A' => "a",
                    // L'option Sujet B aura comme valeur "b"
                    'Sujet B' => "b",
                ],
            ])
            // Le champ name est un champ texte libre
            ->add('name', TextType::class)
            // Le champ email est un champ email
            ->add('email', EmailType::class)
            // Le champ message est un champ textarea
            ->add('message', TextareaType::class)
        ;
    }

    /**
     * On surcharge la configuration pour définir la classe modèle qui doit être associée
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Ici on informe que la classe modèle est Contact::class, qui revient à écrire App\Form\Model\Contact
            'data_class' => Contact::class,
        ]);
    }
}
