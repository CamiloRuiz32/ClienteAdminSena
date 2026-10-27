<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $computers = $this->fetchDataFromApi($url . '/computers');
        return view('computers.index', compact('computers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $computer = $this->fetchDataFromApi($url . '/computers/' . $id);
        return view('computers.show', compact('computer'));
    }

    public function create()
    {
        return view('computers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');
        $file = $request->file('imagen');

        $response = Http::asMultipart()
            ->attach('imagen', fopen($file->getRealPath(), 'r'), $file->getClientOriginalName())
            ->post($url . '/computers', [
                ['name' => 'number', 'contents' => $request->number],
                ['name' => 'brand', 'contents' => $request->brand],
            ]);

        if ($response->failed()) {
            return back()->withErrors(['error' => $response->body()])->withInput();
        }

        return redirect()->route('computers.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $computer = $this->fetchDataFromApi($url . '/computers/' . $id);
        return view('computers.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/computers/' . $id, $request->all());
        return redirect()->route('computers.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/computers/' . $id);
        return redirect()->route('computers.index');
    }
}