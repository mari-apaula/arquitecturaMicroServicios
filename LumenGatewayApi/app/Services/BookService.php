<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    /**
     * The base uri to be used to consume the books service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to be used to consume the books service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
        
        // Validate configuration
        if (empty($this->baseUri)) {
            throw new \RuntimeException('BOOKS_SERVICE_BASE_URL is not configured in .env file');
        }
    }

    /**
     * Get the full list of books from the books service
     * @return string
     */
    public function obtainBooks()
    {
        // CORREGIDO: Agregado /api
        return $this->performRequest('GET', '/api/books');
    }

    /**
     * Create an instance of book using the books service
     * @return string
     */
    public function createBook($data)
    {
        // CORREGIDO: Agregado /api
        return $this->performRequest('POST', '/api/books', $data);
    }

    /**
     * Get a single book from the books service
     * @return string
     */
    public function obtainBook($book)
    {
        // CORREGIDO: Agregado /api
        return $this->performRequest('GET', "/api/books/{$book}");
    }

    /**
     * Edit a single book from the books service
     * @return string
     */
    public function editBook($data, $book)
    {
        // CORREGIDO: Agregado /api
        return $this->performRequest('PUT', "/api/books/{$book}", $data);
    }

    /**
     * Remove a single book from the books service
     * @return string
     */
    public function deleteBook($book)
    {
        // CORREGIDO: Agregado /api
        return $this->performRequest('DELETE', "/api/books/{$book}");
    }
}