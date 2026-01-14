<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class CategoryService
{
    use ConsumesExternalService;

    /**
     * The base uri to be used to consume the categories service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to be used to consume the categories service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = env('CATEGORIES_SERVICE_BASE_URL');
        $this->secret = env('CATEGORIES_SERVICE_SECRET');

        // Validate configuration
        if (empty($this->baseUri)) {
            throw new \RuntimeException('CATEGORIES_SERVICE_BASE_URL is not configured in .env file');
        }
    }

    /**
     * Get a single category from the categories service
     * @return array
     */
    public function obtainCategory($category)
    {
        return $this->performRequest('GET', "/categories/{$category}");
    }

    /**
     * Get all categories from the categories service
     * @return array
     */
    public function obtainCategories()
    {
        return $this->performRequest('GET', '/categories');
    }
}