<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Brand;
use App\Entity\Product;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // --- Créer des catégories ---
        $categories = [];
        foreach (['T-shirts', 'Pantalons', 'Vestes'] as $catName) {
            $category = new Category();
            $category->setName($catName);
            $manager->persist($category);
            $categories[] = $category;
        }
    
        // --- Créer des produits avec images ---
        for ($i = 1; $i <= 10; $i++) {
            $product = new Product();
            $product->setName("Produit $i");
            $product->setDescription("Description du produit numéro $i.");
            $product->setPrice(mt_rand(20, 150));
            $product->setStock(mt_rand(0, 20));
            $product->setSlug("produit-$i");
            $product->setCategory($categories[array_rand($categories)]);

            // Ajout de 1 à 3 images
            $numImages = mt_rand(1, 3);
            for ($j = 1; $j <= $numImages; $j++) {
                $image = new Image();
                $image->setUrl("placeholder-$j.jpg"); // À adapter si tu veux mettre des vraies URLs
                $image->setAlt("Image $j pour produit $i");
                $image->setProduct($product);
                $manager->persist($image);
            }

            $manager->persist($product);
        }

        $manager->flush();
    }
}
