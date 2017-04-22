<?php
///**
// * Created by PhpStorm.
// * User: Adela_PC
// * Date: 29.01.2017
// * Time: 21:39
// */
//
//namespace AppBundle\Controller;
//
//use AppBundle\Form\RegisterType;
//use AppBundle\Entity\User;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
//
//class RegistrationController extends Controller
//{
//
//    /**
//     * @Route("/register", name="user_registration")
//     */
//    public function registerAction(Request $request)
//    {
//        // 1) build the form
//        $user = new User();
//        $form = $this->createForm(new RegisterType(), $user);
//
//        // 2) handle the submit (will only happen on POST)
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//
//            $form->get('firstName')->getData();
//
//
//            // 3) Encode the password (you could also do this via Doctrine listener)
//            $password = $this->get('security.password_encoder')
//                ->encodePassword($user, $user->getPassword());
//            $user->setPassword($password);
//
//            $user->setUsername($form->get('username')->getData());
//            $user->setFirstName($form->get('firstName')->getData());
//            $user->setLastName($form->get('lastName')->getData());
//            $user->setEmail($form->get('email')->getData());
//
//
//            // 4) save the User!
//            $em = $this->getDoctrine()->getManager();
//
//            $em->persist($user);
//            $em->flush();
//
//            // ... do any other work - like sending them an email, etc
//            // maybe set a "flash" success message for the user
//
//            return $this->redirectToRoute('core_add_dogs', array(), 302);
//
//        }
//
//        return $this->render(
//            'registration/register.html.twig',
//            array('form' => $form->createView())
//        );
//    }
//
//
//}