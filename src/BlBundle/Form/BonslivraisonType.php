<?php

namespace BlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use BlBundle\BlBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlBundle\Entity\Bonslivraison;
use BlBundle\Entity\Clients;
use BlBundle\Entity\Category;
use BlBundle\Form\CategoryType;
use BlBundle\Form\ClientsType;
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






class BonslivraisonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      // // Arbitrairement, on récupère toutes les catégories qui commencent par "D" (sinon je laisse vide %)
        $pattern = 'D%';

        $builder
          ->add('dateBl',            DateTimeType::class)
       //            Le typeDateType que l'on a utilisé affiche 3 champs select
       //            Il existe aussi un type TimezoneType pour choisir le fuseau horaire
          ->add('clientBl',          EntityType::class, array(
                'class'   => 'BlBundle:Clients',
                'choice_label'    => 'nomClient',
                'multiple' => false,
                ))

                // 'query_builder' => function($repository) use($pattern){
                //   // Arbitrairement, on récupère toutes les catégories qui commencent par "D" (sinon je laisse vide %)
                //   $pattern = 'D%';
                //   $pattern = '%';
                //   return $repository->getLikeQueryBuilder($pattern);
                //   }


          ->add('societeBl',          EntityType::class, array(
                'class'   => 'BlBundle:Articles',
                'choice_label'    => 'libelleArt',
                'multiple' => false,
                ))

          ->add('quantiteBl',        IntegerType::class)
          ->add('descriptionBl',     TextareaType::class)
          ->add('transporteurBl',    TextType::class)

          // Ajout de categories dans le Type bonslivraison (pour permettre l imbrication de formulaires Many to Many)
          // 1er argument : nom du champ, ici « categories », car c'est le nom de l'attribut
          // 2e argument : type du champ, ici « CollectionType » qui est une liste de quelque chose
          // 3e argument : tableau d'options du champ
          // ->add('categories', CollectionType::class, array(
          //       'entry_type'   => CategoryType::class,
          //       'allow_add'    => true,
          //       'allow_delete' => true

          // ci-dessous, les catégories préparées en vue de sélectionner ultérieurement les bons par année ou par un autre critère -->
          // se référer aussi à {{form.categories}} dans la vue bl (twig)
          // ci-dessous je vais utiliser EntityType pour permettre un choix d options
          // L'option class définit quel est le type d'entité à
          // L'option choice_label définit comment afficher les entités dans le select du formulaire
          // ->add('categories', EntityType::class, array(
          //       'class'   => 'BlBundle:Clients',
          //       'choice_label'    => 'nomClient',
          //       'multiple' => false,
          //       'query_builder' => function($repository) use($pattern){
          //         // Arbitrairement, on récupère toutes les catégories qui commencent par "D" (sinon je laisse vide %)
          //         $pattern = 'D%';
          //         $pattern = '%';
          //         return $repository->getLikeQueryBuilder($pattern);
          //         }
          //         ))

          // maintenant nous allons ajouter une eventlistener, fonction qui va écouter un événement
          ->addEventlistener(
                FormEvents::PRE_SET_DATA, // 1er argument. PRE_SET_DATA est l event qui nous interesse ici
                function(FormEvent $event){
                  // on récupère notre objet Bonslivraison au déclenchement de cet event
                  $bons = $event->getData();

                  if (null === $bons)
                  {
                  return;
                    // on sort de la fonction sans rien faire, si $bons vaut null
                  }

                  // si le bon n'est pas créé ou s'il n existe pas en base
                  if(null === $bons->getId())
                  {
                    // // alors ajout du champ published
                    // $event->getForm()->add(
                    //   'published', CheckboxType::class, array('required' => false));
                    //
                    // return $this->render('BlBundle:Vues:bl.html.twig', array(
                    //     'form' => $form->createView())),
                  }
                  else
                  {
                    // $event->getForm()->remove('published');

                    return;
                  }
                }
            );
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blbundle_bonslivraison';
    }

    public function getName()
    {
        return 'blbundle_bonslivraisontype';
    }

}
