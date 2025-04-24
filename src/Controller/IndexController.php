<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }


    #[Route('/products', name: 'app_products')]
    public function displayProduct(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('index/products.html.twig', [
            'products' => $products,
        ]);
    }
}
