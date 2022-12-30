<?php

namespace App\Controller\Admin;

use App\Entity\Home;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
            TextEditorField::new('description'),
        ];
    }
}
