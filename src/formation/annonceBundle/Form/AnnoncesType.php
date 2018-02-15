<?php

namespace formation\annonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnoncesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('titre','text')
                ->add('date','date')
                 ->add('Categories','entity',array('class'=>'annonceBundle:Categories','property'=>'nom'))
                ->add('contenu','textarea')
                ->add('envoyer','submit')
               
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'formation\annonceBundle\Entity\Annonces'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'formation_annoncebundle_annonces';
    }


}
