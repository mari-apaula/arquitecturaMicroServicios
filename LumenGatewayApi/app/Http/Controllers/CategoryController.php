<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Instancia del servicio que consume CategoriesApi
     * @var CategoryService
     */
    public $categoryService;

    /**
     * Inyectamos el servicio
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Retorna la lista de categorías
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->categoryService->obtainCategories());
    }

    /**
     * Crea una instancia de categoría
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->categoryService->createCategory($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Muestra una categoría específica
     * @return Illuminate\Http\Response
     */
    public function show($category)
    {
        return $this->successResponse($this->categoryService->obtainCategory($category));
    }

    /**
     * Actualiza una categoría
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        return $this->successResponse($this->categoryService->editCategory($request->all(), $category));
    }

    /**
     * Elimina una categoría
     * @return Illuminate\Http\Response
     */
    public function destroy($category)
    {
        return $this->successResponse($this->categoryService->deleteCategory($category));
    }
}