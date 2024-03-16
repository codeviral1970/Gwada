<?php

namespace App\Controller\Admin;

use App\Form\ThumbType;
use App\Entity\ThumbImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Dto\CrudDto;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ThumbImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ThumbImage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('imageFile', 'Imagefile')
                ->setFormType(VichImageType::class)
                ->hideOnIndex(),
            ImageField::new('thumb', 'Image')
                ->setBasePath('images/home')
                ->setUploadDir('public/images/home')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->onlyOnIndex(),
            BooleanField::new('isActive', 'Active'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Gestion les trois images de la page accueil')
            ->setEntityLabelInSingular('Image');
    }
}
