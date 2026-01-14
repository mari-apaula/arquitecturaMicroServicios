<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class CategoryService
{
    use ConsumesExternalService;

    /**
     * La URL base del microservicio (se lee del .env)
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        // Esto busca la variable en config/services.php o directamente del env
        $this->baseUri = config('services.categories.base_uri');
    }

    /**
     * Obtener lista completa
     */
    public function obtainCategories()
    {
        return $this->performRequest('GET', '/categories');
    }

    /**
     * Crear una categoría
     */
    public function createCategory($data)
    {
        return $this->performRequest('POST', '/categories', $data);
    }

    /**
     * Obtener una categoría
     */
    public function obtainCategory($category)
    {
        return $this->performRequest('GET', "/categories/{$category}");
    }

    /**
     * Actualizar
     */
    public function editCategory($data, $category)
    {
        return $this->performRequest('PUT', "/categories/{$category}", $data);
    }

    /**
     * Eliminar
     */
    public function deleteCategory($category)
    {
        return $this->performRequest('DELETE', "/categories/{$category}");
    }
}