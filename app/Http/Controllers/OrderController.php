<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;

class OrderController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $orders = Order::all();
        return view('IndexOrder', compact('orders', 'clients'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('OrderCreate', compact('clients'));
    }

    public function store(Request $request)
    {
        $order = new Order();

        $order->cliente_id = $request->input('cliente_id');
        $order->fecha_pedido = $request->input('fecha_pedido');
        $order->fecha_entrega = $request->input('fecha_entrega');
        $order->estado = $request->input('estado');

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
        $clients = Client::all();

        return view('OrderEdit', compact('order', 'clients'));
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

        $order->save();
        return redirect()->route('orders.show', $order->id)->with('success', 'Pedido actualizado con éxito');
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->delete();
            return redirect("/orders");
        }
    }
}
