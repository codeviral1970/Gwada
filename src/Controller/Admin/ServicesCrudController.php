<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Services::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Titre'),
            SlugField::new('slug', 'slug')->setTargetFieldName('name'),
            TextEditorField::new('description'),
            TextField::new('imageFile', 'Nom de l\'image')
              ->setFormType(VichImageType::class)
              ->hideOnIndex(),
            ImageField::new('avatar')->setBasePath('images/services')->onlyOnIndex(),

            TextEditorField::new('goodToKnow')->hideOnIndex(),
            TextEditorField::new('courseOfTheDay')->hideOnIndex(),
            TextEditorField::new('menu'),
        ];
    }
}
