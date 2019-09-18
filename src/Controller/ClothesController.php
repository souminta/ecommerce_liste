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

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class ClothesController extends AbstractController
{
    /**
     * @Route("/clothes/{id}", name="clothes")
     */
    public function clothes(Product $product,TypeRepository $TypeRepository, ProductRepository $ProductRepository,CategoryRepository $categoryRepository, SubCategoryRepository $subCategoryRepository): Response
    {
    	//comment
        return $this->render('clothes/clothes.html.twig', [
            /*'controller_name' => 'HomeController',*/
            'product' => $product,
            'types' => $TypeRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            'sub_categories' => $subCategoryRepository->findAll(),
        ]);
    }
    /**
     * @Route("/cart/addItem/{id}", name="cart_addItem_clothes", methods={"POST"})
     */
   /* public function addItemForm(Product $product): Response
    {
        $form = $this->createForm(AddItemType::class, $product);
        return $this->render('clothes/clothes.html.twig', [
            'form' => $form->createView()
        ]);
    }
    public function carts(Request $request,Product $product,TypeRepository $TypeRepository, ProductRepository $ProductRepository,CategoryRepository $categoryRepository, SubCategoryRepository $subCategoryRepository): Response
    {
        //comment
        /*return $this->render('clothes/clothes.html.twig', [
            /*'controller_name' => 'HomeController',
            'product' => $product,
            'types' => $TypeRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            'sub_categories' => $subCategoryRepository->findAll(),
        ]);*/
       /* $product = new Product();
    $form = $this->createForm(ProductType::class, $product);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $this->ProductRepository->addItem($product, 1);
        $this->addFlash('success', $this->translator->trans('app.cart.addItem.message.success'));
        }
         return $this->redirectToRoute('clothes');
    }*/
    
}