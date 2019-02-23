<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubsOrder;
use App\Http\Resources\SubsOrderResource;
    
class SubsOrderController extends Controller
{
    public function index()
    {
        return SubsOrder::all();
    }

    public function show($id)
    {
        return SubsOrder::find($id);
    }

    public function store(Request $request)
    {
        return SubsOrder::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $order = SubsOrder::findOrFail($id);
        $order->update($request->all());

        return $order;
    }

    public function delete(Request $request, $id)
    {
        $order = SubsOrder::findOrFail($id);
        $order->delete();

        return 204;
    }
}
