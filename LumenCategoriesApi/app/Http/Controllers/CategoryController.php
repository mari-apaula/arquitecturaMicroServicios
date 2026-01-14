<?php

namespace App\Http\Controllers;

use App\Models\Category; // <--- CORREGIDO: Apuntamos a la carpeta correcta
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Listar todas las categorías
     */
    public function index()
    {
        // Traemos las categorías (opcional: puedes usar with('parent') si configuras la relación en el modelo)
        $categories = Category::all();
        return response()->json(['data' => $categories], 200); 
    }

    /**
     * Crear una nueva categoría
     */
    public function store(Request $request)
    {
        // 1. Validar reglas básicas
        $rules = [
            'name' => 'required|max:255',
            'description' => 'nullable|max:1000',
            'parent_id' => 'nullable|integer|min:1',
        ];
        $this->validate($request, $rules);

        // 2. Validar manualmente que la categoría padre exista (si se envió)
        if ($request->has('parent_id') && $request->parent_id) {
            $parent = Category::find($request->parent_id);
            if (!$parent) {
                return response()->json(['error' => 'The parent category does not exist', 'code' => 404], 404);
            }
        }

        // 3. Crear y devolver
        $category = Category::create($request->all());
        return response()->json(['data' => $category], 201);
    }

    /**
     * Mostrar una categoría específica
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found', 'code' => 404], 404);
        }

        return response()->json(['data' => $category], 200);
    }

    /**
     * Actualizar categoría
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found', 'code' => 404], 404);
        }

        // Validar reglas
        $rules = [
            'name' => 'max:255',
            'description' => 'max:1000',
            'parent_id' => 'nullable|integer|min:1',
        ];
        $this->validate($request, $rules);

        // Llenar con los nuevos datos
        $category->fill($request->all());

        // Verificar si algo cambió
        if ($category->isClean()) {
            return response()->json(['error' => 'At least one value must change', 'code' => 422], 422);
        }

        $category->save();
        return response()->json(['data' => $category], 200);
    }

    /**
     * Eliminar categoría
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found', 'code' => 404], 404);
        }

        $category->delete();
        return response()->json(['data' => $category], 200);
    }
}