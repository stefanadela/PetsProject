<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Color;
use AppBundle\Form\ColorType;

/**
 * Color controller.
 *
 * @Route("/admin/color")
 */
class ColorController extends Controller
{

    /**
     * Lists all Color entities.
     *
     * @Route("/", name="admin_list_color")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Color')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Color entity.
     *
     * @Route("/", name="admin_color_create")
     * @Method("POST")
     * @Template("AppBundle:Color:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Color();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_list_color'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Color entity.
     *
     * @param Color $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Color $entity)
    {
        $form = $this->createForm(new ColorType(), $entity, array(
            'action' => $this->generateUrl('admin_color_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Color entity.
     *
     * @Route("/new", name="admin_color_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Color();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Color entity.
     *
     * @Route("/{id}", name="admin_color_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Color')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Color entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Color entity.
     *
     * @Route("/{id}/edit", name="admin_color_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Color')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Color entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Color entity.
    *
    * @param Color $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Color $entity)
    {
        $form = $this->createForm(new ColorType(), $entity, array(
            'action' => $this->generateUrl('admin_color_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Color entity.
     *
     * @Route("/{id}", name="admin_color_update")
     * @Method("PUT")
     * @Template("AppBundle:Color:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Color')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Color entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_color_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Color entity.
     *
     * @Route("/{id}", name="admin_color_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Color')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Color entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_list_color'));
    }

    /**
     * Creates a form to delete a Color entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_color_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
