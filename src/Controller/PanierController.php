<?php
// src/Controller/PanierController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\Panier;
use App\Entity\Product;
class PanierController extends AbstractController
{
    /**
     * @Route("/cart", name = "app_cart")
     */
    public function showAll()
    {
        $repository = $this->getDoctrine()->getRepository(Panier::class);
        
        # Get logged user then get his ['id']
        $user = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
        /** Check IF user have exist cart  **/
        # select cart from database where user id equal to cureent logged user 
        $user_cart = $repository->findBy(array('user_id' => $user));
            # Then select all user cart products to display it to user
        $user_products = $this->getDoctrine()->getRepository(Product::class)->findBy(array(
        'id' => $user_cart));
            
        for ($i=0;$i<count($user_products);$i++){
            $user_products[$i]->quantity=$user_cart[$i]->getQuantite();
        }
            # pass selected products to the twig page to show them
       return $this->render('cart.twig', array(
          'produits'  => $user_products   
      ));
    }
    
    
    
   /**
     * 
     * @param int $item
     * @Route("/{item}/item-remove", requirements={"item" = "\d+"}, name="delete_item")
     * @return RedirectResponse
     *
     */
    public function deleteItem(int $item){
        $em = $this->getDoctrine()->getManager();
        $u_id =$this->container->get('security.token_storage')->getToken()->getUser()->getId();
        $product =$this->getDoctrine()->getRepository(Panier::class)->findOneBy(array(
            'user_id' => $u_id,
            'produit_id' => $item));
        if ($product->getQuantite() == 1){
            $em->remove($product);
            $em->flush();
        }else{
            $product->setQuantite($product->getQuantite()-1);
            $em->flush();
        }
            
         return $this->redirect($this->generateUrl('app_cart'));
    }
       /**
     * 
     * @param int $item
     * @Route("/{item}/item-add", requirements={"item" = "\d+"}, name="add_item")
     * @return RedirectResponse
     *
     */
    public function addItem(int $item){
        $em = $this->getDoctrine()->getManager();
        $u_id =$this->container->get('security.token_storage')->getToken()->getUser()->getId();
        $user_cart = $em->getRepository(Panier::class)->findOneBy(array(
            'user_id' => $u_id,
            'produit_id' => $item));
        if ($user_cart == null){
            $user_cart = new Panier($u_id,$item);
            $user_cart->setQuantite(1);
            $em->persist($user_cart);
            $em->flush();
        }else{
            $user_cart->setQuantite($user_cart->getQuantite()+1);
            $em->flush();
        }
       
        $this->addFlash('success', 'Le produit à bien été ajouté.');  
        return $this->redirect($this->generateUrl('app_cart'));
    }
}

