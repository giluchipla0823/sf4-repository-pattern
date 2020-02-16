<?php

namespace App\Controller;

use App\Services\Books\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Obtener lista de libros
     *
     * @Route("/books", name="books_index")
     * @param Request $request
     */
    public function index(Request $request)
    {
        $books = $this->bookService->all();

        dump($books);
        exit();

//        return $this->render('books/index.html.twig', [
//            'controller_name' => 'BooksController',
//        ]);
    }

    /**
     * Obtener información de libro por su id
     *
     * @Route("/books/{id}", name="books_show")
     * @param Request $request
     * @param int $id
     */
    public function show(Request $request, int $id){
        $book = $this->bookService->find($id);

        dump($book);
        exit();
    }

    /**
     * Obtener información de libro por su título
     *
     * @Route("/books/title/{title}", name="books_show_by_title")
     * @param Request $request
     * @param string $title
     */
    public function showByTitle(Request $request, string $title){
        $book = $this->bookService->findOneByTitle($title);

        dump($book);
        exit();
    }
}
