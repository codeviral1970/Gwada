<?php

namespace App\Controller\Admin;

use App\Entity\ThumbImage;
use App\Form\ThumbType;
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
            BooleanField::new('isActive'),
        ];
    }
}
