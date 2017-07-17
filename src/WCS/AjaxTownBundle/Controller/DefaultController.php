<?php

namespace WCS\AjaxTownBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WCSAjaxTownBundle:Default:index.html.twig');
    }
}
