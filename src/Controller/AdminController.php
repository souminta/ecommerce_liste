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
use App\Entity\Basket;
use App\Form\BasketType;
use App\Repository\BasketRepository;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin(ProductRepository $productRepository, TypeRepository $TypeRepository,CategoryRepository $categoryRepository,SubCategoryRepository $subCategoryRepository,BasketRepository $BasketRepository): Response
    {
        //comment
        return $this->render('admin/admin.html.twig', [
            /*'controller_name' => 'HomeController',*/
            'products' => $productRepository->findAll(),
            'types' => $TypeRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            'sub_categories' => $subCategoryRepository->findAll(),
        ]);
    }
}