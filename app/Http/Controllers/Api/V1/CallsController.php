<?php

namespace App\Http\Controllers\Api\V1;

use App\Call;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCallsRequest;
use App\Http\Requests\UpdateCallsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class CallsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Call::all();
    }

    public function show($id)
    {
        return Call::findOrFail($id);
    }

    public function update(UpdateCallsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $call = Call::findOrFail($id);
        $call->update($request->all());

        return $call;
    }

    public function store(StoreCallsRequest $request)
    {
        $request = $this->saveFiles($request);
        $call = Call::create($request->all());

        return $call;
    }

    public function destroy($id)
    {
        $call = Call::findOrFail($id);
        $call->delete();
        return '';
    }
}
