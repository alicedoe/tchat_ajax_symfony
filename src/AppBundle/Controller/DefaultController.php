<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        // replace this example code with whatever you need

        return $this->render('default/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }

    public function postmessageAction() {
      $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Message')
        ;
      
     

        $listMessages = $repository->findAll();
        
    return new JsonResponse($listMessages); 
//        $response = new JsonResponse();
//return  $response->setData(array(
//    'data' => $listMessages,
//    'success' => 'ok'
//));
    }

}
