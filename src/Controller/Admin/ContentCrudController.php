<?php

namespace App\Controller\Admin;

use App\Entity\Content;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Content::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('main_name', 'Nom principal')
                ->setRequired(true),
            TextField::new('title_bio', 'Titre de la biographie')
                ->setRequired(true),
            TextEditorField::new('description_bio', 'Description de la biographie')
                ->setRequired(true),
            TextField::new('image_bio_file', 'Image de la biographie')
                ->setFormType(VichImageType::class)
                ->setFormTypeOptions(['allow_delete' => false, 'download_uri' => false, 'image_uri' => true, 'asset_helper' => true])
                ->hideOnIndex()
                ->setRequired(true),
            TextField::new('video_bio', 'Vidéo de la biographie')
                ->setRequired(true),
            TextField::new('title_artwork', 'Titre de l\'oeuvre')
                ->setRequired(true),
        ];
    }
}
