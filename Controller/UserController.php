<?php

namespace StartPack\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/compte")
 */
class UserController extends Controller
{
    /**
     * @Route("/login",name="user_login")
     * @Template()
     */
    public function loginAction()
    {
        return array();
    }
    
    /**
     * @Route("/subscribe",name="user_subscribe")
     * @Template()
     */
    public function subscribeAction()
    {
        return array();
    }
}
