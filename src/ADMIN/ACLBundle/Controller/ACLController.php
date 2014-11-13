<?php

namespace ADMIN\ACLBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use ADMIN\ACLBundle\Entity;
use Symfony\Component\HttpFoundation\Response;


class ACLController extends Controller
{
    public function indexAction()
    {
      echo "Listo";
      exit();
        //return $this->render('ACLBundle:Default:index.html.twig', array('name' => $name));
    }

    // public function loginAction(Request $request)
    // {
    //     $session = $request->getSession();
    //
    //     // get the login error if there is one
    //     if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
    //         $error = $request->attributes->get(
    //             SecurityContext::AUTHENTICATION_ERROR
    //         );
    //     } else {
    //         $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
    //         $session->remove(SecurityContext::AUTHENTICATION_ERROR);
    //     }
    //
    //     return $this->render(
    //         'ACLBundle:Security:login.html.twig',
    //         array(
    //             // last username entered by the user
    //             'last_username' => $session->get(SecurityContext::LAST_USERNAME),
    //             'error'         => $error,
    //         )
    //     );
    // }

    public function productosAction($id)
    {
      $em = $this->getDoctrine()->getManager();
      $categoria = $em->getRepository("ACLBundle:Categorias")->find($id);

      $producto = new Entity\Productos();
      $producto->setProducto("Segundo carro");
      $producto->setPrecio(19.19);
      $producto->setDescripcion("Otro carro... de aquellos");
      $producto->setCategoria($categoria);

      $em->persist($producto);
      $em->flush();

      return new Response("Se ha creado el producto: ".$producto->getId());
    }
}
