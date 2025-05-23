<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Image;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // 1) Créer les catégories et les stocker dans un tableau associatif
        $categoryData = [
            'Pants' => 'IMG_2198.jpeg',
            'Carpenter pants' =>'IMG_8700.jpeg',
            'Caps' => 'IMG_0641.jpeg',
            'Shorts' => 'IMG_0640.jpeg',
            'Tee' => 'IMG_8820.jpeg',
            'Zip' => 'IMG_8958.jpeg'
        ];
        $categories = [];
    
        foreach ($categoryData as $name => $image) {
            $cat = new Category();
            $cat->setName(ucfirst($name));
            $cat->setImage($image);
            $manager->persist($cat);

            $key = strtolower(trim($name));
            $categories[$key] = $cat;
        }
    
        // 2) Tableau de produits avec clé 'category'
        $productsData = [
            [
                'name' => 'LEVI\'S.3i - Black',
                'description' => 'Pantalon Levis\'s 501 Original Black de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 89.99,
                'main_image' => 'IMG_3657.jpeg',
                'gallery_images' => ['IMG_3656.jpeg', 'IMG_3655.jpeg'],
                'category' => 'Pants'
            ],
            [
                'name' => 'LEVI\'S.3i - Original Juicy',
                'description' => 'Pantalon Levis\'s 501 Original Juicy de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 89.99,
                'main_image' => 'IMG_3647.jpeg',
                'gallery_images' => ['IMG_3646.jpeg', 'IMG_3645.jpeg'],
                'category' => 'Pants'
            ],
            [
                'name' => 'LEVI\'S.3i - Original Blue Wash',
                'description' => 'Pantalon Levis\'s 501 Original Washed de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 89.99,
                'main_image' => 'IMG_3636.jpeg',
                'gallery_images' => ['IMG_3635.jpeg', 'IMG_3634.jpeg'],
                'category' => 'Pants'
            ],
            [
                'name' => 'LEVI\'S.3i - Original Crimson RW',
                'description' => 'Pantalon Levis\'s 501 Original Racing de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 89.99,
                'main_image' => 'IMG_3651.jpeg',
                'gallery_images' => ['IMG_3649.jpeg', 'IMG_3650.jpeg'],
                'category' => 'Pants'
            ],
            [
                'name' => 'LEVI\'S.3i - Nocturne',
                'description' => 'Pantalon Levis\'s 501 Nocturne de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 89.99,
                'main_image' => 'IMG_3654.jpeg',
                'gallery_images' => ['IMG_3653.jpeg', 'IMG_3652.jpeg'],
                'category' => 'Pants'
            ],
            [
                'name' => 'LEVI\'S.3i - Stoned',
                'description' => 'Pantalon Levis\'s 501 Stoned de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 89.99,
                'main_image' => 'IMG_3660.jpeg',
                'gallery_images' => ['IMG_3659.jpeg', 'IMG_3658.jpeg'],
                'category' => 'Pants'
            ],
            [
                'name' => 'LEVI\'S.3i - Origal Dockyard',
                'description' => 'Pantalon Levis\'s 501 Original Dockyard de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 89.99,
                'main_image' => 'IMG_3641.jpeg',
                'gallery_images' => ['IMG_3640.jpeg', 'IMG_3639.jpeg'],
                'category' => 'Pants'
            ],
            [
                'name' => 'LEVI\'S.3i - Crown series',
                'description' => 'Pantalon Levis\'s 501 Crown series de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 89.99,
                'main_image' => 'IMG_3665.jpeg',
                'gallery_images' => ['IMG_3664.jpeg', 'IMG_3663.jpeg'],
                'category' => 'Pants'
            ],
            [
                'name' => 'LEVI\'S - Canary',
                'description' => 'Pantalon Levis\'s 501 Original Juicy de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 89.99,
                'main_image' => 'IMG_3633.jpeg',
                'gallery_images' => ['IMG_3632.jpeg', 'IMG_3634.jpeg'],
                'category' => 'Pants'
            ],
            [
                'name' => 'CARPENTER PANT CARHARTT - Black',
                'description' => 'CARPENTER PANT CARHARTT - Black de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 99.99,
                'main_image' => 'IMG_3618.jpeg',
                'gallery_images' => ['IMG_3617.jpeg', 'IMG_3616.jpeg'],
                'category' => 'Carpenter pants'
            ],
            [
                'name' => 'CARPENTER PANT CARHARTT - Cream',
                'description' => 'CARPENTER PANT CARHARTT cream de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 99.99,
                'main_image' => 'IMG_3574.jpeg',
                'gallery_images' => ['IMG_3573.jpeg', 'IMG_3572.jpeg'],
                'category' => 'Carpenter pants'
            ],
            [
                'name' => 'CARPENTER PANT CARHARTT - London bricks',
                'description' => 'CARPENTER PANT CARHARTT London bricks de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 99.99,
                'main_image' => 'IMG_3608.jpeg',
                'gallery_images' => ['IMG_3607.jpeg', 'IMG_3603.jpeg'],
                'category' => 'Carpenter pants'
            ],
            [
                'name' => 'CARPENTER PANT CARHARTT - Brown',
                'description' => 'CARPENTER PANT CARHARTT brown de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 99.99,
                'main_image' => 'IMG_3577.jpeg',
                'gallery_images' => ['IMG_3576.jpeg', 'IMG_3575.jpeg'],
                'category' => 'Carpenter pants'
            ],
            [
                'name' => 'CARPENTER PANT CARHARTT - Gray',
                'description' => 'CARPENTER PANT CARHARTT gray de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 99.99,
                'main_image' => 'IMG_3584.jpeg',
                'gallery_images' => ['IMG_3583.jpeg', 'IMG_3582.jpeg'],
                'category' => 'Carpenter pants'
            ],
            [
                'name' => 'CARPENTER PANT CARHARTT - Tracksuit',
                'description' => 'CARPENTER PANT CARHARTT tracksuit de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 99.99,
                'main_image' => 'IMG_3611.jpeg',
                'gallery_images' => ['IMG_3610.jpeg', 'IMG_3612.jpeg'],
                'category' => 'Carpenter pants'
            ],
            [
                'name' => 'CARPENTER PANT CARHARTT - Dust gray',
                'description' => 'CARPENTER PANT CARHARTT Dust gray de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 99.99,
                'main_image' => 'IMG_3615.jpeg',
                'gallery_images' => ['IMG_3614.jpeg', 'IMG_3613.jpeg'],
                'category' => 'Carpenter pants'
            ],
            [
                'name' => 'SHORT LEVI\'S.3i - White',
                'description' => 'SHORT LEVI\'S.3i - White de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3624.jpeg',
                'gallery_images' => ['IMG_3623.jpeg', 'IMG_3622.jpeg'],
                'category' => 'Shorts'
            ],
            [
                'name' => 'SHORT LEVI\'S.3i - W. Juicy',
                'description' => ' SHORT LEVI\'S.3i - W. Juicy White de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3627.jpeg',
                'gallery_images' => ['IMG_3625.jpeg', 'IMG_3626.jpeg'],
                'category' => 'Shorts'
            ],
            [
                'name' => 'SHORT LEVI\'S.3i - M. lightBlue',
                'description' => 'SHORT LEVI\'S.3i - M. lightBlue de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3630.jpeg',
                'gallery_images' => ['IMG_3628.jpeg', 'IMG_3629.jpeg'],
                'category' => 'Shorts'
            ],
            [
                'name' => 'MAISON.3i - OG TEE',
                'description' => 'MAISON.3i - OG TEE de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3462.jpeg',
                'gallery_images' => ['IMG_8726.jpeg','IMG_8728.jpeg'],
                'category' => 'Tee'
            ],
            [
                'name' => 'SIGNATURE TEE.3i - WHITE',
                'description' => 'SIGNATURE TEE.3i - WHITE de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3461.jpeg',
                'gallery_images' => ['IMG_3465.jpeg'],
                'category' => 'Tee'
            ],
            [
                'name' => 'SIGNATURE TEE.3i - BLACK',
                'description' => 'SIGNATURE TEE.3i - BLACK de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3466.jpeg',
                'gallery_images' => ['IMG_3467.jpeg'],
                'category' => 'Tee'
            ],
            [
                'name' => 'BI.DJAY TEE.3i - BLUE',
                'description' => 'BI.DJAY TEE.3i - BLUE de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3463.jpeg',
                'gallery_images' => ['IMG_3464.jpeg'],
                'category' => 'Tee'
            ],
            [
                'name' => 'M3ISON CLUB ZIP - ZIP',
                'description' => 'M3ISON CLUB ZIP - ZIP de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3470.jpeg',
                'gallery_images' => ['IMG_3468.jpeg','IMG_9034.jpeg'],
                'category' => 'Zip'
            ],
            [
                'name' => 'ATLAS CAP V2 - BLACK',
                'description' => 'ATLAS CAP V2 - BLACK de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3471.jpeg',
                'gallery_images' => ['IMG_3471.jpeg'],
                'category' => 'Caps'
            ],
            [
                'name' => 'ATLAS CAP V2 - BLUE',
                'description' => 'ATLAS CAP V2 - BLUE de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3472.jpeg',
                'gallery_images' => ['IMG_3472.jpeg'],
                'category' => 'Caps'
            ],
            [
                'name' => 'YANKEES A LA MAISON FITTED CAP - BROWN',
                'description' => 'YANKEES A LA MAISON FITTED CAP - BROWN de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 64.99,
                'main_image' => 'IMG_3481.jpeg',
                'gallery_images' => ['IMG_3491.jpeg','IMG_3490.jpeg'],
                'category' => 'Caps'
            ],
            [
                'name' => 'YANKEES A LA MAISON FITTED CAP - DarkBlue',
                'description' => 'YANKEES A LA MAISON FITTED CAP - DarkBlue de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 64.99,
                'main_image' => 'IMG_3477.jpeg',
                'gallery_images' => ['IMG_3486.jpeg'],
                'category' => 'Caps'
            ],
            [
                'name' => 'YANKEES A LA MAISON SNAPBACK - WHITE',
                'description' => 'YANKEES A LA MAISON SNAPBACK - WHITE de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 64.99,
                'main_image' => 'IMG_3487.jpeg',
                'gallery_images' => ['IMG_3488.jpeg'],
                'category' => 'Caps'
            ],
            [
                'name' => 'SIGNATURE CAP - BLACK',
                'description' => 'SIGNATURE CAP - BLACK de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3475.jpeg',
                'gallery_images' => ['IMG_3484.jpeg'],
                'category' => 'Caps'
            ],
            [
                'name' => 'SIGNATURE CAP - BLUE',
                'description' => 'SIGNATURE CAP - BLUE de la marque maison3i sortit lors du tout premier évènement "Welcome Home" en Juillet 2023',
                'price' => 34.99,
                'main_image' => 'IMG_3478.jpeg',
                'gallery_images' => ['IMG_3485.jpeg'],
                'category' => 'Caps'
            ],
        
        ];
    
        // 3) Création des produits
        foreach ($productsData as $data) {
            $product = new Product();
            $product->setName($data['name']);
            $product->setDescription($data['description']);
            $product->setPrice($data['price']);
            $product->setStock(1);
    
            // On lie la bonne catégorie (via la clé du tableau)
            $key = strtolower(trim($data['category']));
            $product->setCategory($categories[$key]);

            // Image principale
            $mainImage = new Image();
            $mainImage->setUrl($data['main_image']);
            $mainImage->setAlt('Image principale de ' . $data['name']);
            $mainImage->setProduct($product);
            $mainImage->setIsMain(true);
            $manager->persist($mainImage);
            $product->setMainImage($mainImage);
    
            // Galerie
            foreach ($data['gallery_images'] as $galleryImage) {
                $image = new Image();
                $image->setUrl($galleryImage);
                $image->setAlt('Galerie de ' . $data['name']);
                $image->setProduct($product);
                $manager->persist($image);
                $product->addImage($image);
            }
    
            $manager->persist($product);
        }
    
        $manager->flush();
    }
}
