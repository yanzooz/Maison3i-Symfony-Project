<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\ImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $fields = [];

        if ($pageName === Crud::PAGE_INDEX) {
            $fields = [
                IdField::new('id'),
                TextField::new('name', 'Nom du produit'),
                TextField::new('shortDescription', 'Résumé')->onlyOnIndex(),
                MoneyField::new('price', 'Prix')->setCurrency('EUR')->setStoredAsCents(false),
                AssociationField::new('category', 'Catégorie'),
                ImageField::new('mainImage.url', 'Aperçu')->setBasePath('/image/'),
            ];
        }

        if ($pageName === Crud::PAGE_EDIT || $pageName === Crud::PAGE_NEW) {
            $fields = [
                TextField::new('name', 'Nom du produit'),
                TextEditorField::new('description', 'Description'),
                MoneyField::new('price', 'Prix')->setCurrency('EUR')->setStoredAsCents(false),
                AssociationField::new('category', 'Catégorie')->autocomplete(),
                NumberField::new('stock','stock'),
                CollectionField::new('images')
                    ->setEntryType(ImageType::class)
                    ->onlyOnForms()
                    ->allowAdd()
                    ->allowDelete()
                    ->renderExpanded() // optionnel, sinon dropdowns
            ];
        }

        return $fields;
    }
}
