<?php

namespace App\Http\Controllers\Api\V1;

use App\Dealer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDealersRequest;
use App\Http\Requests\UpdateDealersRequest;

class DealersController extends Controller
{
    public function index()
    {
        return Dealer::all();
    }

    public function show($id)
    {
        return Dealer::findOrFail($id);
    }

    public function update(UpdateDealersRequest $request, $id)
    {
        $dealer = Dealer::findOrFail($id);
        $dealer->update($request->all());

        return $dealer;
    }

    public function store(StoreDealersRequest $request)
    {
        $dealer = Dealer::create($request->all());

        return $dealer;
    }

    public function destroy($id)
    {
        $dealer = Dealer::findOrFail($id);
        $dealer->delete();
        return '';
    }
}
