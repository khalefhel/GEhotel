<?php

namespace App\Controller\Admin;

use App\Entity\Hotel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
class HotelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hotel::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('nom'),
            textField::new('lieu'),
            ImageField::new('attachment')
            ->setLabel('Attachment')
            ->setUploadDir('public\uploads\attachments'),
            TextEditorField::new('description'),
            NumberField::new('nombre_de_chambres'),
            NumberField::new('nombre_etoile'),
            NumberField::new('prix_chambre'),
            textField::new('photo'),


        ];
    }
    
}
