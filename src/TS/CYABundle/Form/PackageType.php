<?php

namespace TS\CYABundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TS\CYABundle\Form\EventListener\AddCourseFieldSubscriber;

class PackageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('headquarter', EntityType::class, [
                'class' => 'TS\CYABundle\Entity\Headquarter',
                'query_builder' => function (EntityRepository $repository) {
                    $qb = $repository->createQueryBuilder('headquarter')
                        ->orderBy('headquarter.name', 'ASC');
                    return $qb;
                },
                'choice_label' => 'name',
                'placeholder' => 'Choose an option',
                'attr' => ['class' => 'headquarter_selector select-select2']
            ])
            ->add('price', MoneyType::class, [
                'currency' => 'USD'
            ])
            ->add('semanas', IntegerType::class, [
                'label' => 'Weeks'
            ])
            ->add('packageLodging', CollectionType::class, [
                'entry_type' => PackageLodgingType::class,
                'label' => ' ',
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true
            ])
            ->add('price_inscription', MoneyType::class, [
                'currency' => 'USD'
            ])
            ->add('description_inscription')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TS\CYABundle\Entity\Package'
        ));
    }
}
