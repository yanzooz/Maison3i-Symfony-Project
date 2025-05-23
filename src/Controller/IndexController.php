<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProductRepository $productRepository, CategoryRepository $categoryRepository): Response
    {
        $products = $productRepository->findBy([], ['id' => 'DESC'], 10);
        $categories = $categoryRepository->findAll();

        return $this->render('index/index.html.twig', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    #[Route('/products', name: 'app_products')]
    public function displayProduct(Request $request, ProductRepository $productRepository, CategoryRepository $categoryRepository): Response
    {
        $categoryId = $request->query->get('category');
        $selectedCategory = null;
        $products = [];

        if ($categoryId) {
            $selectedCategory = $categoryRepository->find($categoryId);
            $products = $productRepository->findBy(['category' => $selectedCategory]);
        } else {
            $products = $productRepository->findAll();
        }

        return $this->render('index/products.html.twig', [
            'products' => $products,
            'categories' => $categoryRepository->findAll(),
            'selectedCategory' => $selectedCategory,
        ]);
    }

    #[Route('/products/{id}', name: 'app_product_show')]
    public function show(Product $product): Response
    {
        return $this->render('index/detail.html.twig', [
            'product' => $product,
        ]);
    }
}
