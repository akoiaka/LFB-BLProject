<?php

namespace BlBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormView;
use BlBundle\BlBundle;
use BlBundle\Entity\Factures;
use BlBundle\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use BlBundle\Form\CategoryType;
use BlBundle\Form\BonslivraisonType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use BlBundle\Repository\CategoryRepository;
use BlBundle\Repository\FacturesRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class FactureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('dateF',            DateType::class, array(
              'widget' => 'single_text',
              'format' => 'dd-MM-yyyy',
              'label' => 'DATE',
              ))
        ->add('referenceF',          EntityType::class, array(
              'class'   => 'BlBundle:Clients',
              'choice_label'    => 'nomClient',
              'multiple' => false,
              ))
        ->add('designationF',          EntityType::class, array(
              'class'   => 'BlBundle:Articles',
              'choice_label'    => 'libelleArt',
              'multiple' => false,
              ))
        ->add('quantite1F',             IntegerType::class)
        ->add('quantite2F',             IntegerType::class)
        ->add('quantite3F',             IntegerType::class)
        ->add('puHt1',                  IntegerType::class)
        ->add('puHt2',                  IntegerType::class)
        ->add('puHt3',                  IntegerType::class);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlBundle\Entity\Facture'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blbundle_facture';
    }


}
