<?php

namespace App\Controller;

use App\Entity\Books\Book;
use App\Form\Books\BookType;
use App\Services\Books\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/books")
 */
class BooksController extends AbstractController
{

    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * @Route("/", name="books_index", methods={"GET"})
     */
    public function index(): Response
    {
        $books = $this->bookService->all();

        return $this->render('books/index.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @Route("/create", name="books_create", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function create(Request $request): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->bookService->create($book);

            return $this->redirectToRoute('books_index');
        }

        return $this->render('books/new.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="books_show", methods={"GET"})
     * @param Book $book
     * @return Response
     */
    public function show(Book $book): Response
    {
        return $this->render('books/show.html.twig', [
            'book' => $book,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="books_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Book $book
     * @return Response
     * @throws \Exception
     */
    public function edit(Request $request, Book $book): Response
    {
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->bookService->update($book);

            return $this->redirectToRoute('books_index');
        }

        return $this->render('books/edit.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="books_delete", methods={"DELETE"})
     * @param Request $request
     * @param Book $book
     * @return Response
     */
    public function delete(Request $request, Book $book): Response
    {
        if ($this->isCsrfTokenValid('delete' . $book->getId(), $request->request->get('_token'))) {
            $this->bookService->remove($book);
        }

        return $this->redirectToRoute('books_index');
    }
}