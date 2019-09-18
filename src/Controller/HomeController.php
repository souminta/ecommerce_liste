<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use App\Entity\Type;
use App\Form\TypeType;
use App\Repository\TypeRepository;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Entity\SubCategory;
use App\Form\SubCategoryType;
use App\Repository\SubCategoryRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function home(ProductRepository $productRepository, TypeRepository $TypeRepository,CategoryRepository $categoryRepository,SubCategoryRepository $subCategoryRepository): Response
    {
    	//comment
        return $this->render('home/home.html.twig', [
            /*'controller_name' => 'HomeController',*/
            'products' => $productRepository->findAll(),
            'types' => $TypeRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            'sub_categories' => $subCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/c/{id}", name="sub_category_home")
     */
    public function subCategoryHome($id, ProductRepository $productRepository, TypeRepository $TypeRepository,CategoryRepository $categoryRepository,SubCategoryRepository $subCategoryRepository): Response
    {
        //comment
        return $this->render('home/home.html.twig', [
            //'products' => $productRepository->findAll(),
            // pour recuperer subcat de la id product id par createQueryBuilder
            'products' => $productRepository->findBySubCategory($id),
            'types' => $TypeRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            'sub_categories' => $subCategoryRepository->findAll(),
        ]);
    }
}