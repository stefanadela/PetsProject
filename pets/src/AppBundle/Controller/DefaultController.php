<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class DefaultController
 *
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="home_page")
     * @Template()
     */
    public function indexAction(Request $request)
    {


        $userService = $this->get('app.user_service');

        return array();
    }
}
