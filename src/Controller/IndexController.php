<?php

namespace App\Controller;

use App\Entity\Type;
use App\Form\TypeType;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Entity\SubCategory;
use App\Form\SubCategoryType;
use App\Repository\SubCategoryRepository;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(TypeRepository $TypeRepository, ProductRepository $ProductRepository,CategoryRepository $categoryRepository, SubCategoryRepository $subCategoryRepository):Response
    {
    	//comment
        return $this->render('index/index.html.twig', [
            //'controller_name' => 'IndexController',
            'types' => $TypeRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            'sub_categories' => $subCategoryRepository->findAll(),
        ]);
    }
}