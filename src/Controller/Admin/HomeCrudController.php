<?php

namespace App\Controller\Admin;

use App\Entity\Home;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class HomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Home::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('title'),
            TextField::new('imageName'),
            NumberField::new('imageSize')->hideOnForm(),
            TextField::new('imageFile', 'Bg image')
              ->setFormType(VichImageType::class)
              ->hideOnIndex(),
            ImageField::new('bgImg')->setBasePath('images/home')->onlyOnIndex(),
            TextEditorField::new('description'),
        ];
    }
}
