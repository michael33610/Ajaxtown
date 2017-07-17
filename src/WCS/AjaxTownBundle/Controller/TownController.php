<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 12/06/17
 * Time: 15:04
 */

namespace WCS\AjaxTownBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TownController extends Controller
{
    /**
     * Lists all town entities.
     *
     * @Route("/autocomplete/{town}", name="town_index")
     * @Method("POST")
     */
    public function autocompAction(Request $request,$town)
    {
        $isAjax = $request->isXmlHttpRequest();
        if ($isAjax){
            $repository=$this->getDoctrine()->getRepository("WCSAjaxTownBundle:Town");
            $data=$repository->getTownLike($town);
            return new JsonResponse(array('data' => json_encode($data)));
        }
        return new Response('This is not ajax!', 400);

    }
}