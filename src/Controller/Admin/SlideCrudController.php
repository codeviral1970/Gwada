<?php

namespace App\Controller\Admin;

use App\Entity\Slide;
use App\Form\SlideType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SlideCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Slide::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('imageName', 'Nom de l\'image'),
            TextField::new('imageFile', 'Imagefile ')
                ->setFormType(VichImageType::class)
                ->hideOnIndex(),
            ImageField::new('caption', 'Caption')
                ->setBasePath('images/gallery')
                ->setUploadDir('public/images/gallery')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->onlyOnIndex(),
            AssociationField::new('gallery', 'Activité'),
            BooleanField::new('isFirstPage'),

        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Images caroussel')
            ->setEntityLabelInSingular('Image caroussel')
            ->setDefaultSort(['imageName' => 'ASC']);
    }
}
