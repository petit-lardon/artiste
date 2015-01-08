<?php

namespace Julien\Bundle\ArtistBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Julien\Bundle\ArtistBundle\Entity\Exponent;
use Julien\Bundle\ArtistBundle\Form\ExponentType;

/**
 * Exponent controller.
 *
 * @Route("/exponent")
 */
class ExponentController extends Controller
{

    /**
     * Lists all Exponent entities.
     *
     * @Route("/", name="exponent")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JulienArtistBundle:Exponent')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Exponent entity.
     *
     * @Route("/", name="exponent_create")
     * @Method("POST")
     * @Template("JulienArtistBundle:Exponent:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Exponent();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('exponent_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Exponent entity.
     *
     * @param Exponent $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Exponent $entity)
    {
        $form = $this->createForm(new ExponentType(), $entity, array(
            'action' => $this->generateUrl('exponent_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Exponent entity.
     *
     * @Route("/new", name="exponent_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Exponent();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Exponent entity.
     *
     * @Route("/{id}", name="exponent_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JulienArtistBundle:Exponent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Exponent entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Exponent entity.
     *
     * @Route("/{id}/edit", name="exponent_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JulienArtistBundle:Exponent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Exponent entity.');
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
    * Creates a form to edit a Exponent entity.
    *
    * @param Exponent $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Exponent $entity)
    {
        $form = $this->createForm(new ExponentType(), $entity, array(
            'action' => $this->generateUrl('exponent_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Exponent entity.
     *
     * @Route("/{id}", name="exponent_update")
     * @Method("PUT")
     * @Template("JulienArtistBundle:Exponent:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JulienArtistBundle:Exponent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Exponent entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('exponent_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Exponent entity.
     *
     * @Route("/{id}", name="exponent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JulienArtistBundle:Exponent')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Exponent entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('exponent'));
    }

    /**
     * Creates a form to delete a Exponent entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('exponent_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
