<?php

<<<<<<< HEAD
namespace StartPack\FrontBundle\Controller;
=======
namespace StartPack\CoreBundle\Controller;
>>>>>>> 6d4e0cf813f45af83d5553f0a2067935f11eb189

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}
