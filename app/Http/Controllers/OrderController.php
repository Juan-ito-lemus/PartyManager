<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;
use PDF;
use App\Models\Product;


class OrderController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        $products = Product::all();
        $orders = Order::all();
        return view('IndexOrder', compact('orders', 'clients','products'));
    }
    public function pdf() {
        $orders = Order::all();
        $pdf = PDF::loadView('pdf.listado-order', compact('orders'));
        return $pdf->stream('listado-order.pdf');

    }
    public function create()
    {
        $clients = Client::all();
        $products = Product::all(); // Asegúrate de importar el modelo Product
        return view('OrderCreate', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'cliente_id' => 'required|integer',
            'fecha_pedido' => 'required|date',
            'fecha_entrega' => 'required|date',
            'estado' => 'required|max:255',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
        ]);
    
        if ($validator->fails()) {
            return redirect('/orders/create')
                ->withErrors($validator)
                ->withInput();
        }
    
        // Obtener el producto
        $product = Product::find($request->input('product_id'));
    
        if (!$product) {
            return redirect('/orders/create')->with('error', 'Producto no encontrado.');
        }
    
        // Verificar si hay suficientes existencias
        if ($product->fee < $request->input('quantity')) {
            return redirect('/orders/create')->with('error', 'No hay suficientes existencias disponibles.');
        }
    
        // Crear el pedido
        $order = new Order();
        $order->cliente_id = $request->input('cliente_id');
        $order->fecha_pedido = $request->input('fecha_pedido');
        $order->fecha_entrega = $request->input('fecha_entrega');
        $order->estado = $request->input('estado');
        $order->product_id = $request->input('product_id');
        $order->quantity = $request->input('quantity');
        // Actualizar las existencias del producto
        $product->fee -= $request->input('quantity');
        $product->save();
    
        $order->save();
    
        return redirect('/orders');
    }
    

    public function show($id)
    {
        $order = Order::find($id);
    
        if ($order) {
            return view('OrderShow', compact('order'));
        } else {
            return redirect()->route('orders.index')->with('error', 'Pedido no encontrado.');
        }
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $products = Product::all();
        $clients = Client::all();

        return view('OrderEdit', compact('order', 'clients', 'products'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->route('IndexOrder')->with('error', 'Pedido no encontrado.');
        }

        $order->cliente_id = $request->input('cliente_id');
        $order->fecha_pedido = $request->input('fecha_pedido');
        $order->fecha_entrega = $request->input('fecha_entrega');
        $order->estado = $request->input('estado');
        $order->product_id = $request->input('product_id');
        $order->quantity = $request->input('quantity');
        // Actualizar las existencias del producto
        $product->fee -= $request->input('quantity');
        $product->save();

        $order->save();
        return redirect()->route('orders.show', $order->id)->with('success', 'Pedido actualizado con éxito');
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order) {
            // Obtener el producto asociado al pedido
            $product = Product::find($order->product_id);
    
            if ($product) {
                // Incrementar la cantidad del producto
                $product->fee += $order->quantity;
                $product->save();
            }
    
            // Eliminar el pedido
            $order->delete();
    
            return redirect("/orders");
        } else {
            return redirect("/orders")->with('error', 'Pedido no encontrado.');
        }
    }
}