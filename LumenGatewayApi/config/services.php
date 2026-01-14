<?php

return [
    'authors' => [
        'base_uri' => env('AUTHORS_SERVICE_BASE_URL'),
        'secret' => env('AUTHORS_SERVICE_SECRET'),
    ],

    'books' => [
        'base_uri' => env('BOOKS_SERVICE_BASE_URL'),
        'secret' => env('BOOKS_SERVICE_SECRET'),
    ],

    'reviews' => [
        'base_uri' => env('REVIEWS_SERVICE_BASE_URL'),
        'secret' => env('REVIEWS_SERVICE_SECRET'),
    ],

    // --- AQUÍ ESTÁ LA CORRECCIÓN: SOLO UNA ENTRADA ---
    'categories' => [
        'base_uri' => env('CATEGORIES_SERVICE_BASE_URL'),
        'secret' => env('CATEGORIES_SERVICE_SECRET'),
    ],
];