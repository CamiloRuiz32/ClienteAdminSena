<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class TrainingCentersController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);

        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $trainingcenters = $this->fetchDataFromApi($url . '/trainingCenters');

        return view('trainingcenters.index', compact('trainingcenters'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $trainingcenter = $this->fetchDataFromApi(
            $url . '/trainingCenters/' . $id
        );

        return view('trainingcenters.show', compact('trainingcenter'));
    }

    public function create()
    {
        return view('trainingcenters.create');
    }
     public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/trainingCenters', $request->all());

        return redirect()->route('trainingcenters.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $trainingcenter = $this->fetchDataFromApi($url . '/trainingCenters/' . $id);
        return view('trainingcenters.edit', compact('trainingcenter'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/trainingCenters/' . $id, $request->all());

        return redirect()->route('trainingcenters.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/trainingCenters/' . $id);
        return redirect()->route('trainingcenters.index');
    }
}