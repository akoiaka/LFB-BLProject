<?php

namespace BlBundle\Form;

use BlBundle\BlBundle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlBundle\Entity\Bonslivraison;
use BlBundle\Entity\Clients;
use BlBundle\Entity\Category;
use BlBundle\Form\CategoryType;
use BlBundle\Form\ClientsType;
use BlBundle\Repository\ClientsRepository;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use BlBundle\Form\BonslivraisonType;
use Symfony\Component\Form\Form;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormView;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use BlBundle\Repository\CategoryRepository;
use BlBundle\Repository\BonslivraisonRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ClientsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('codeClient')
        ->add('nomClient')
        ->add('siret')
        ->add('adresse1')
        ->add('adresse2')
        ->add('adresse3')
        ->add('codePostal')
        ->add('ville')
        ->add('pays')
        ->add('adresse1Livraison')
        ->add('adresse2Livraison')
        ->add('adresse3Livraison')
        ->add('paysLivraison')
        ->add('telephone')
        ->add('portable')
        ->add('fax')
        ->add('compteComptable')
        ->add('codeIso')
        ->add('codeCEE')
        ->add('numeroIso')
        ->add('codeInsee')
        ->add('contactClient');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlBundle\Entity\Clients'
        ));
    }

    public function getcodeClient()
    {
      return 'codeClient';
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blbundle_clients';
    }


}
