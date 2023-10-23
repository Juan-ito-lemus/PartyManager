<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;


class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::all();
        $products = Product::all();
        return view('IndexInventory', compact('inventory', 'products'));
    }
    
    

    public function create()
    {
        $products = Product::all();
        return view('InventoryCreate', compact('products'));
    }
    

    public function store(Request $request)
    {
        $inventory = new Inventory();

        $inventory->product_id = $request->input('product_id');
        $inventory->cantidad_disponible = $request->input('cantidad_disponible');
        $inventory->estado = $request->input('estado');

        $inventory->save();
        return redirect()->route('inventory.index');
    }

    public function show($id)
    {
        $inventory = Inventory::find($id);
    
        if ($inventory) {
            return view('InventoryShow', compact('inventory'));
        } else {
            return redirect()->route('inventory.index')->with('error', 'Inventario no encontrado.');
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
