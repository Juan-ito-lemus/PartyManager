<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;
use Barryvdh\DomPDF\Facade\pdf as PDF;

class ProductController extends Controller
{
    public function pdf() {
        $products = Product::all();
        $pdf = PDF::loadView('pdf.listado-producto', compact('products'));
        return $pdf->download('listado-producto.pdf');

    }
    public function index()
    {
        $products = Product::all();
        return view('IndexProduct', compact('products'));
    }
    public function Create(){
        return view('ProductCreate');
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'fee' => 'required|numeric',
        'price' => 'required|numeric',
        'cost' => 'required|numeric',
        'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:1048',
    ], [
        'required' => 'El campo :attribute es obligatorio.',
        'numeric' => 'El campo :attribute debe ser un número.',
        'max' => 'El campo :attribute no debe exceder :max caracteres.',
        'image' => 'El archivo seleccionado en :attribute no es una imagen válida.',
        'mimes' => 'Solo se permiten imágenes con extensiones: jpeg, jpg, png, gif, svg.',
        'max' => 'El tamaño máximo permitido para :attribute es :max kilobytes.',
    ]);

    $product = new Product();
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->fee = $request->input('fee');
    $product->price = $request->input('price');
    $product->cost = $request->input('cost');

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect('/Products');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if ($product) {
            return view('ProductShow', compact('product'));
        } else {
            return redirect()->route('products.index')->with('error', 'Cliente no encontrado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Aquí debes buscar el cliente por su ID, suponiendo que tienes un modelo llamado "Client"
        $product = Product::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el cliente encontrado
        return view('ProductEdit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable',
            'fee' => 'required',
            'price' => 'required', // Cambiado a "price"
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:1048',
        ]);
    
        // Obtener el producto a actualizar
        $product = Product::find($id);
    
        if (!$product) {
            // Manejar el caso en que el producto no se encuentra
            return redirect()->route('products.index')->with('error', 'Producto no encontrado');
        }
    
        // Actualizar los datos del producto
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->fee = $request->input('fee');
        $product->price = $request->input('price'); // Cambiado a "price"
    
        // Manejo de la imagen (si se proporciona)
        if ($request->hasFile('image')) {
            // Validar y guardar la imagen
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            // Eliminar la imagen anterior si existe
            if ($product->image) {
                $imagePath = public_path('images/') . $product->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
    
            $product->image = $imageName; // Guardar el nombre de la nueva imagen en el modelo
        }
    
        $product->save();
    
        return redirect()->route('products.show', $product->id)->with('success', 'Producto actualizado con éxito');
    }
    

public function destroy(string $id)
{
    $product = Product::find($id);

$product->inventory()->delete(); // Eliminar las referencias en la tabla "inventory"
$product->delete(); // Luego eliminar el producto

}
}