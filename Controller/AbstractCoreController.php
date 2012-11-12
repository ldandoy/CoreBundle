<?php

namespace StartPack\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


abstract class AbstractCoreController extends Controller {
	
    public function asJSONError($msg,$code=0){
        return $this->asJSON(array(
            'error' => array(
                'message' => $msg,
                'code' => $code
            ),
            'success' => false
        ));
    }
    
    public function getEm($name = null)
    {
        return $this->get('doctrine')->getEntityManager($name);
    }
    
    public function getRepository($entityName)
    {
        $entityName = str_replace('Core:', 'CoreBundle:', $entityName);
        return $this->getEm()->getRepository($entityName);
    }

    public function getDbal()
    {
        return $this->getDoctrine()->getConnection();
    }
    
    public function saveAndFlush($entity)
    {
        $this->getEm()->persist($entity);
        $this->getEm()->flush();
    }

    public function asJSONResult($datas){
        return $this->asJSON(array(
            'success' => true,
            'result' => $datas
        ));
    }

    public function asJSON($data)
    {
        $response = new Response();
        $response->setContent(json_encode($data));
        
        return $response;
    }

    public function setFlash($type,$msg){
        $this->get('session')->setFlash($type,$msg);
    }

    public function isGranted($role){
       return $this->get('security.context')->isGranted($role);
    }

    public function getUser(){
        return $this->get('security.context')->getToken()->getUser();
    }

    public function getNbProduct(){
        $session = $this->getRequest()->getSession();
        $produits = $session->get('produits');
        return count($produits);
    }
}