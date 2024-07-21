<?php

namespace App\Controller\Admin;

use App\Entity\Chambre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class ChambreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chambre::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            textField::new('type'),
            ImageField::new('attachment')
            ->setLabel('Attachment')
            ->setUploadDir('public\uploads\attachments'),
            ImageField::new('attachment2')
            ->setLabel('Attachment2')
            ->setUploadDir('public\uploads\attachments'),
            ImageField::new('attachment3')
            ->setLabel('Attachment3')
            ->setUploadDir('public\uploads\attachments'),
            TextEditorField::new('description'),

            NumberField::new('nombre_de_lits'),
            NumberField::new('prix_par_nuit'),

        ];
    } 
    
}
