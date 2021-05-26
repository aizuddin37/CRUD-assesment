<?php

namespace App\Http\Controllers;
use App\Http\Resources\ClientsResource;
use Illuminate\Http\Request;
use App\Models\Clients;

class ClientsController extends Controller
{
    //get
//     public function getClients(){
// return response()->json(Clients::all(), 200);
//     }

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::paginate(10);
        return ClientsResource::collection($clients);
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
        $clients =new Clients();
        $clients ->Name =$request->Name;
        $clients ->email =$request->email;
        $clients ->phoneNo =$request->phoneNo;
        $clients ->orders =$request->orders;
        $clients ->quantity =$request->quantity;
        $clients ->address =$request->address;
        $clients ->status =$request->status;
        if($clients->save())
        {
            return new ClientsResource($clients);
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $clients=Clients::findOrFail($id);
      return new ClientsResource($clients);

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
        $clients =Clients::findOrFail($id);
        $clients ->Name =$request->Name;
        $clients ->email =$request->email;
        $clients ->phoneNo =$request->phoneNo;
        $clients ->orders =$request->orders;
        $clients ->quantity =$request->quantity;
        $clients ->address =$request->address;
        $clients ->status =$request->status;
        if($clients->save())
        {
            return new ClientsResource($clients);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $clients =Clients::findOrFail($id);
      if($clients->delete())
      {
          return new ClientsResource($clients);
      }
}
}
