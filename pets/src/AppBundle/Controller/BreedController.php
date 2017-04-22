<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Breed;
use AppBundle\Form\BreedType;

/**
 * Breed controller.
 *
 * @Route("/admin/breed")
 */
class BreedController extends Controller
{

    /**
     * Lists all Breed entities.
     *
     * @Route("/", name="admin_list_breed")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Breed')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Breed entity.
     *
     * @Route("/", name="admin_breed_create")
     * @Method("POST")
     * @Template("AppBundle:Breed:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Breed();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_list_breed'));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Breed entity.
     *
     * @param Breed $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Breed $entity)
    {
        $form = $this->createForm(new BreedType(), $entity, array(
            'action' => $this->generateUrl('admin_breed_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Breed entity.
     *
     * @Route("/new", name="admin_breed_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Breed();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Breed entity.
     *
     * @Route("/{id}", name="admin_breed_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Breed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Breed entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Breed entity.
     *
     * @Route("/{id}/edit", name="admin_breed_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var Breed $entity */
        $entity = $em->getRepository('AppBundle:Breed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Breed entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Breed entity.
     *
     * @param Breed $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Breed $entity)
    {
        $form = $this->createForm(new BreedType(), $entity, array(
            'action' => $this->generateUrl('admin_breed_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Breed entity.
     *
     * @Route("/{id}", name="admin_breed_update")
     * @Method("PUT")
     * @Template("AppBundle:Breed:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var Breed $entity */
        $entity = $em->getRepository('AppBundle:Breed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Breed entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_breed_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Breed entity.
     *
     * @Route("/{id}", name="admin_breed_delete")
     * @Method("DELETE")
     *
     * @param Request $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Breed')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Breed entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_list_breed'));
    }

    /**
     * Creates a form to delete a Breed entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_breed_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
