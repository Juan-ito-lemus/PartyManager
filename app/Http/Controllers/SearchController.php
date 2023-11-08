<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; // Importa el modelo que deseas buscar
use App\Models\Product; // Importa el modelo que deseas buscar
use App\Models\Order;


class SearchController extends Controller
{
    public function searchClients(Request $request)
    {
        $query = $request->input('query');
        $results = Client::search($query)->get();

        return view('search.clients', compact('results'));
    }

    public function searchProducts(Request $request)
    {
        $query = $request->input('query');
        $results = Product::search($query)->get();

        return view('search.products', compact('results'));
    }

    public function searchOrders(Request $request)
    {
        $query = $request->input('query');
        $results = Order::search($query)->get();

        return view('search.orders', compact('results'));

    }

}