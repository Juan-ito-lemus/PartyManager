<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('IndexClient', compact('clients'));
    }
    public function Create(){
        return view('ClientCreate');
    }
    public function store(Request $request)
    {
        $client = new Client();
        $client->name = $request->input('name');
        $client->lastname = $request->input('lastname');
        $client->colony = $request->input('colony');
        $client->address = $request->input('address');
        $client->cellphone = $request->input('cellphone');
        $client->debt = $request->input('debt');
        $client->comment = $request->input('debt_comment'); // Corregí el nombre del campo

        if ($request->hasFile('image')) {
            // Validar y guardar la imagen
            $request->validate([
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:1048',
            ]);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $client->image = $imageName; // Guardar el nombre de la imagen en el modelo
        }

        $client->save();
        
        return redirect('/Clients');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);

        if ($client) {
            return view('ClientShow', compact('client'));
        } else {
            return redirect()->route('clients.index')->with('error', 'Cliente no encontrado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);
        return view('ClientEdit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'colony' => 'nullable',
            'address' => 'nullable',
            'cellphone' => 'nullable',
            'debt' => 'required',
            'debt_comment' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ejemplo de validación para la imagen
        ]);

        // Obtener el cliente a actualizar
        $client = Client::find($id);

        if (!$client) {
            // Manejar el caso en que el cliente no se encuentra
            return redirect()->route('clients.index')->with('error', 'Cliente no encontrado');
        }

        // Actualizar los datos del cliente
        $client->name = $request->input('name');
        $client->lastname = $request->input('lastname');
        $client->colony = $request->input('colony');
        $client->address = $request->input('address');
        $client->cellphone = $request->input('cellphone');
        $client->debt = $request->input('debt');
        $client->comment = $request->input('debt_comment');

        // Manejo de la imagen (si se proporciona)
        if ($request->hasFile('image')) {
            // Validar y guardar la imagen
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Eliminar la imagen anterior si existe
            if ($client->image) {
                $imagePath = public_path('images/') . $client->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $client->image = $imageName; // Guardar el nombre de la nueva imagen en el modelo
        }

        $client->save();

        return redirect()->route('clients.show', $client->id)->with('success', 'Cliente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id); // Obtén el cliente por su ID

        if ($client) {
            // Borra la imagen asociada al cliente si existe
            $imagePath = public_path('images/' . $client->image); // Ruta a la imagen en el sistema de archivos
            if (file_exists($imagePath)) {
                unlink($imagePath); // Elimina la imagen
            }

            // Elimina el cliente
            $client->delete();
            return redirect("/Clients");
        }
    }
    public function imageUpload(Request $request): RedirectResponse
    {
        // dd(($request->all()));
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:1048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'),$imageName);

        return view("Menu");
    }
}