<?php

namespace App\Controller\Admin;

use App\Entity\Formule;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FormuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formule::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom'),
            TextField::new('price', 'Prix'),
            TextField::new('style', 'Style css'),
            TextEditorField::new('description', 'Description'),
            AssociationField::new('activity', 'Lien activité'),
        ];
    }
}
