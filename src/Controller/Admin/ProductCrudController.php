<?php

namespace App\Controller\Admin;

use App\EasyAdmin\Field\ImageGalleryField;
use App\Entity\Image;
use App\Entity\Product;
use App\Form\ImageType;
use Doctrine\Common\Collections\Collection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Asset;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use PhpParser\ErrorHandler\Collecting;
use Twig\Markup;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }
 
    public function configureFields(string $pageName): iterable
    {
        if ($pageName === Crud::PAGE_INDEX) {
            return [
                IdField::new('id'),
                TextField::new('name', 'Nom du produit'),
                TextField::new('shortDescription', 'Résumé')->onlyOnIndex(),
                MoneyField::new('price', 'Prix')->setCurrency('EUR')->setStoredAsCents(false),
                DateTimeField::new('createdAt', 'Créé le'),
                AssociationField::new('category', 'Catégorie'),
                ImageField::new('mainImageFromGallery.url', 'Aperçu')->setBasePath('/image'),
            ];
        }

        if ($pageName === Crud::PAGE_EDIT || $pageName === Crud::PAGE_NEW) {
            return [
                TextField::new('name', 'Nom du produit'),
                TextEditorField::new('description', 'Description'),
                MoneyField::new('price', 'Prix')->setCurrency('EUR')->setStoredAsCents(false),
                AssociationField::new('category', 'Catégorie')->autocomplete(),
                NumberField::new('stock', 'Stock'),
                CollectionField::new('images')
                    ->setEntryType(ImageType::class)
                    ->onlyOnForms()
                    ->allowAdd()
                    ->allowDelete()
                    ->renderExpanded(),
            ];
        }
        
        if ($pageName === Crud::PAGE_DETAIL){
            return[
                TextField::new('name', 'Nom du produit'),
                TextEditorField::new('description', 'Description'),
                MoneyField::new('price', 'Prix')->setCurrency('EUR')->setStoredAsCents(false),
                AssociationField::new('category', 'Catégorie')->autocomplete(),
                NumberField::new('stock', 'Stock'),
                CollectionField::new('images', 'Images')
                    ->setTemplatePath('admin/field/image_gallery.html.twig')
                    ->addCssClass('field-image')                    
            ];
        }





        return [];
    }
}
