<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
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
          IdField::new('id')
            ->hideOnForm()
            ->hideOnIndex(),
          TextField::new('name', 'Titre'),
          SlugField::new('slug', 'slug')
            ->setTargetFieldName('name')
            ->onlyOnForms(),
          TextEditorField::new('description'),
          TextField::new('imageFile', 'Image')
            ->setFormType(VichImageType::class)
            ->hideOnIndex(),
          ImageField::new('avatar')->setBasePath('images/services')->onlyOnIndex(),
          TextField::new('imageName', 'Nom image'),
          TextEditorField::new('goodToKnow', 'Bon à savoir')->hideOnIndex(),
          TextEditorField::new('courseOfTheDay', 'Déroulement journée')->hideOnIndex(),
          TextEditorField::new('menu', 'Menu'),
          BooleanField::new('isBest'),
        ];
    }
}
