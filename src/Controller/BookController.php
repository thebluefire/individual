<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Genre;
use App\Form\BookType;
use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/Book")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/", name="Book_index", methods={"GET"})
     */
    public function index(BookRepository $BookRepository): Response
    {
        return $this->render('Book/index.html.twig', [
            'Books' => $BookRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="Book_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $Book = new Book();
        $form = $this->createForm(BookType::class, $Book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Book);
            $entityManager->flush();

            return $this->redirectToRoute('Book_index');
        }

        return $this->render('Book/new.html.twig', [
            'Book' => $Book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Book_show", methods={"GET"})
     */
    public function show(Book $Book): Response
    {
        return $this->render('Book/show.html.twig', [
            'Book' => $Book
        ]);
    }

    /**
     * @Route("/{id}/edit", name="Book_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Book $Book): Response
    {
        $form = $this->createForm(BookType::class, $Book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Book_index');
        }

        return $this->render('Book/edit.html.twig', [
            'Book' => $Book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Book_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Book $Book): Response
    {
        if ($this->isCsrfTokenValid('delete'.$Book->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($Book);
            $entityManager->flush();
        }

        return $this->redirectToRoute('Book_index');
    }
    
    /**
     * @Route("/find/{name}", name="find_Book_by_name")
     * @param $name
     * @param BookRepository $BookRepository
     * @return Response
     */
    public function findAllByName($name, BookRepository $BookRepository): Response
    {
        return $this->render('Book/index.html.twig', [
            'Books' => $BookRepository->findByName($name)
        ]);
    }
}
