<?php

namespace Loyko\MaxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Loyko\MaxBundle\Entity\Book;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
	public function detailAction($name)
	{
		var_dump($name);
	}
	
	public function newAction(Request $request)
	{
		$book = new Book();
		
		$form = $this->createFormBuilder($book)
			->add('author','text')
			->add('title', 'text')
			->add('description', 'textarea')
			->add('tag', 'text')
			->getForm();

		if ($request->isMethod('POST')) {
			$form->bind($request);
			
			if ($form->isValid()) {
				$data = $form->getData();
				$em = $this->getDoctrine()->getManager();
    				$em->persist($data);
    				$em->flush();
				
				return $this->redirect($this->generateUrl('book_list'));
			}
		}
		return $this->render('LoykoMaxBundle:Book:new.html.twig', array(
			'form' => $form->createView(),
		));
	}
}
