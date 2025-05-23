<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Form\ImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }


   public function configureFields(string $pageName): iterable
    {
    if ($pageName === Crud::PAGE_INDEX) {
        return [
            TextField::new('name', 'Nom de la catégorie'),
            TextField::new('productsNames', 'Produits associés')->onlyOnDetail(),
            ImageField::new('image', 'Aperçu')->setBasePath('/image/assets'),
        ];
    }


    if ($pageName === Crud::PAGE_NEW) {
        return [
            TextField::new('name', 'Nom de la catégorie'),
            ImageField::new('image', 'Image')
                ->setBasePath('/image/assets')
                ->setUploadDir('public/image/assets')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            AssociationField::new('products', 'Produits associés')
                ->autocomplete()
                ->setFormTypeOptions([
                    'by_reference' => false, // important pour les collections (OneToMany côté inverse)
                ])
        ];
    }

    if ($pageName === Crud::PAGE_EDIT) {
        return [
            TextField::new('name', 'Nom de la catégorie'),
            ImageField::new('image', 'Image')
                ->setBasePath('/image/assets')
                ->setUploadDir('public/image/assets')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            AssociationField::new('products', 'Produits associés')
                ->autocomplete()
        ];
    }

    if ($pageName === Crud::PAGE_DETAIL) {
        return [
            TextField::new('name', 'Nom de la catégorie'),
            CollectionField::new('products', 'Produits associés')
                ->setTemplatePath('admin/field/products_links.html.twig'),
            ImageField::new('image', 'Aperçu')
                ->setBasePath('/image/assets'),
        ];
    }
    return [];
    }
}
