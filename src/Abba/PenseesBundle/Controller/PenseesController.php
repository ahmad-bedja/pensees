<?php

namespace Abba\PenseesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


use Abba\PenseesBundle\Entity\Auteur;
use Abba\PenseesBundle\Form\AuteurType;
use Abba\PenseesBundle\Entity\Citation;
use Abba\PenseesBundle\Form\CitationType;

class PenseesController extends Controller
{
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getRepository('AbbaPenseesBundle:Citation');
		$pensees = $repository->findAll();

		return $this->render('AbbaPenseesBundle:Pensees:index.html.twig',array('pensees' => $pensees) );
	}

	public function nouvelAuteurAction(Request $request)
	{
		$au = new Auteur();
		$form = $this->createForm(new AuteurType(), $au);
		
		$form->handleRequest($request);

		if ($form->isValid()) {
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($au);
			$em->flush();

			//message succes
			$this->get('session')->getFlashBag()->add('success','Nouvel auteur créé avec succès');
			
			return $this->redirect($this->generateUrl('homepage'));
		}
		
		return $this->render('AbbaPenseesBundle:Pensees:create.html.twig', array('form' => $form->createView()) );
	}

	public function nouvelleCitationAction(Request $request)
	{
		$ci = new Citation();
		$form = $this->createForm(new CitationType(), $ci);
		
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($ci);
			$em->flush();

			//message succes
			$this->get('session')->getFlashBag()->add('success','Nouvelle citation créé avec succès');
			
			return $this->redirect($this->generateUrl('homepage'));
		}
		
		return $this->render('AbbaPenseesBundle:Pensees:createCitation.html.twig', array('form' => $form->createView()) );
	}

	public function editerCitationAction($id,Request $request){

		$ci = $this->getDoctrine()->getRepository('AbbaPenseesBundle:Citation')->find($id);
		
		if (isset($ci)) {
			$form = $this->createForm(new CitationType(), $ci);
			
			$form->handleRequest($request);

			if ($form->isSubmitted() && $form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($ci);
				$em->flush();

				$this->get('session')->getFlashBag()->add('success','Citation éditée avec succès');
				
				return $this->redirect($this->generateUrl('homepage'));
			}

		}

		return $this->render('AbbaPenseesBundle:Pensees:createCitation.html.twig', array('form' => $form->createView()) );
	}


	public function supprimerCitationAction($id)
	{
		$a = $this->getDoctrine()->getRepository('AbbaPenseesBundle:Citation')->find($id);
		if (isset($a)) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($a);
			$em->flush();
		}

		$this->get('session')->getFlashBag()->add('success','Citation supprimée avec succès');
		return $this->redirect($this->generateUrl('homepage'));
	}
}
