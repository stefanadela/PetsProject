<?php
/**
 * Created by PhpStorm.
 * User: Adela_PC
 * Date: 30.01.2017
 * Time: 22:07
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;


class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        return $this->render('AppBundle:Security:login.html.twig',
            array('error' => $error));

    }
}