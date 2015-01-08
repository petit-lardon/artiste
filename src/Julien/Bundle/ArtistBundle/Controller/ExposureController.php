<?php

namespace Julien\Bundle\ArtistBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Julien\Bundle\ArtistBundle\Entity\Exposure;
use Julien\Bundle\ArtistBundle\Form\ExposureType;

/**
 * Exposure controller.
 *
 * @Route("/exposure")
 */
class ExposureController extends Controller
{

    /**
     * Lists all Exposure entities.
     *
     * @Route("/", name="exposure")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JulienArtistBundle:Exposure')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Exposure entity.
     *
     * @Route("/", name="exposure_create")
     * @Method("POST")
     * @Template("JulienArtistBundle:Exposure:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Exposure();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('exposure_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Exposure entity.
     *
     * @param Exposure $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Exposure $entity)
    {
        $form = $this->createForm(new ExposureType(), $entity, array(
            'action' => $this->generateUrl('exposure_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Exposure entity.
     *
     * @Route("/new", name="exposure_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Exposure();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Exposure entity.
     *
     * @Route("/{id}", name="exposure_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JulienArtistBundle:Exposure')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Exposure entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Exposure entity.
     *
     * @Route("/{id}/edit", name="exposure_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JulienArtistBundle:Exposure')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Exposure entity.');
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
    * Creates a form to edit a Exposure entity.
    *
    * @param Exposure $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Exposure $entity)
    {
        $form = $this->createForm(new ExposureType(), $entity, array(
            'action' => $this->generateUrl('exposure_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Exposure entity.
     *
     * @Route("/{id}", name="exposure_update")
     * @Method("PUT")
     * @Template("JulienArtistBundle:Exposure:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JulienArtistBundle:Exposure')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Exposure entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('exposure_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Exposure entity.
     *
     * @Route("/{id}", name="exposure_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JulienArtistBundle:Exposure')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Exposure entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('exposure'));
    }

    /**
     * Creates a form to delete a Exposure entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('exposure_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
