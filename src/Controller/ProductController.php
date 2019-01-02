<?php
// src/Controller/ProductController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Product;


class ProductController extends AbstractController
{
    /**
     * @Route("/catalogue" , name="app_catalogue")
     */
    public function showAll()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findAll();
        return $this->render("catalogue.twig", ['produits' => $products]);
    }
    /**
     * @Route("/catalogue/{item}")
     */
    public function showCategories($item)
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository-> findBy(array('description' => $item));
        return $this->render("catalogue.twig", ['produits' => $products]);
    }
     /**
     * @Route("/", name="app_homepage")
     */
    public function showBestSales()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findBestSales();
        return $this->render("home.twig", ['produits' => $products]);
    }
     /**
     * @Route("/search", name="app_search")
     */
    public function searchItem(Request $request)
    {
        if ($request->isMethod('POST')) {
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $products = $repository->findBy(array('nom' => ($request->request->get('item'))));
            if ($products == null){
                $request->getSession()->getFlashBag()->set('danger', "Produit n'est pas trouvé");
            }
            return $this->render("catalogue.twig", ['produits' => $products]);
        }
        return $this->generateUrl('app_catalogue');
    }
}
?>