<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use  GuzzleHttp\Client;




class CarroController extends Controller
{
    private $client;
    private $token;

    public function __construct()
    {
        $this->middleware('auth');
        $this->client = new Client(['base_uri' => 'https://isapi.intelisis-solutions.com']);
        $this->token = $this->getTokenApi();
    }
    
    public function getTokenApi(){

        $response = $this->client->request('POST', '/auth/', [
            'form_params' => [
                'username' => 'TEST001',
                'password' => 'intelisis'
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        return $result['token'];
    }

    public function index()
    {
        $response = $this->client->request('POST', '/api/VehicleInv/', [
            'headers' => [
                'Authorization' => 'Token ' . $this->token
            ],
            'form_params' => [
                'dealerid' => '31',
                'condicion' => 'Todos'
            ]
        ]);

        $carros = json_decode($response->getBody(), true);

        return view('carro.index')->with('carros', $carros['data']);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
