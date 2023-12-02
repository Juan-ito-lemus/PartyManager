<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\pdf as PDF;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::all();
        $products = Product::all();
        return view('IndexInventory', compact('inventory', 'products'));
    }
    
    public function pdf() {
        $inventory = Inventory::all();
        $pdf = PDF::loadView('pdf.listado-inventario', compact('inventory'));
        return $pdf->download('listado-inventario.pdf');

    }

    public function create()
    {
        $products = Product::all();
        return view('InventoryCreate', compact('products'));
    }
    

    public function show($id)
    {
        $inventory = Inventory::find($id);
    
        if ($inventory) {
            return view('InventoryShow', compact('inventory'));
        } else {
            return redirect()->route('IndexInventory')->with('error', 'Inventario no encontrado.');
        }
    }
    

    public function store(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'product_id' => 'required|integer',
                'cantidad_disponible' => 'required|integer|min:0',
                'estado' => 'required|string',
            ], [
                'required' => 'El campo :attribute es obligatorio.',
                'integer' => 'El campo :attribute debe ser un número entero.',
                'min' => 'El campo :attribute debe ser mayor o igual a :min.',
                'in' => 'El campo :attribute debe ser uno de los siguientes valores: :values.',
            ]);
    
            if ($validator->fails()) {
                return redirect()->route('inventory.create')
                    ->withErrors($validator)
                    ->withInput();
            }
    
            $inventory = new Inventory();
            $inventory->product_id = $request->input('product_id');
            $inventory->cantidad_disponible = $request->input('cantidad_disponible');
            $inventory->estado = $request->input('estado');
    
            $inventory->save();
    
            return redirect()->route('inventory.index')->with('success', 'Inventario creado con éxito');
        } catch (\Exception $e) {
            // Log the error or return a specific error view
            return redirect()->route('inventory.create')->with('error', 'Error al crear el inventario: ' . $e->getMessage());
        }
    }
    
    

    

    public function edit($id)
    {
        $products = Product::all();
        $inventory = Inventory::find($id);
    
        if (!$inventory) {
            return redirect()->route('inventory.index')->with('error', 'Inventario no encontrado.');
        }
    
       
        return view('InventoryEdit', compact('inventory', 'products'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'cantidad_disponible' => 'required',
            'estado' => 'required',
        ]);

        $inventory = Inventory::find($id);

        if (!$inventory) {
            return redirect()->route('inventory.index')->with('error', 'Inventario no encontrado');
        }

        $inventory->product_id = $request->input('product_id');
        $inventory->cantidad_disponible = $request->input('cantidad_disponible');
        $inventory->estado = $request->input('estado');
        $inventory->save();

        return redirect()->route('inventory.index', $inventory->id)->with('success', 'Inventario actualizado con éxito');
    }

    public function destroy(string $id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();

        return redirect("/Inventory");
    }
}
