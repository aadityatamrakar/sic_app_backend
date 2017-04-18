<?php

namespace App\Http\Controllers;

use App\Call;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCallsRequest;
use App\Http\Requests\UpdateCallsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class CallsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Call.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('call_access')) {
            return abort(401);
        }
        $calls = Call::all();

        return view('calls.index', compact('calls'));
    }

    /**
     * Show the form for creating new Call.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('call_create')) {
            return abort(401);
        }
        $relations = [
            'dealers' => \App\Dealer::get()->pluck('shop_name', 'id')->prepend('Please select', ''),
        ];

        return view('calls.create', $relations);
    }

    /**
     * Store a newly created Call in storage.
     *
     * @param  \App\Http\Requests\StoreCallsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCallsRequest $request)
    {
        if (! Gate::allows('call_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $call = Call::create($request->all());

        return redirect()->route('calls.index');
    }


    /**
     * Show the form for editing Call.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('call_edit')) {
            return abort(401);
        }
        $relations = [
            'dealers' => \App\Dealer::get()->pluck('shop_name', 'id')->prepend('Please select', ''),
        ];

        $call = Call::findOrFail($id);

        return view('calls.edit', compact('call') + $relations);
    }

    /**
     * Update Call in storage.
     *
     * @param  \App\Http\Requests\UpdateCallsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCallsRequest $request, $id)
    {
        if (! Gate::allows('call_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $call = Call::findOrFail($id);
        $call->update($request->all());

        return redirect()->route('calls.index');
    }


    /**
     * Display Call.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('call_view')) {
            return abort(401);
        }
        $relations = [
            'dealers' => \App\Dealer::get()->pluck('shop_name', 'id')->prepend('Please select', ''),
        ];

        $call = Call::findOrFail($id);

        return view('calls.show', compact('call') + $relations);
    }


    /**
     * Remove Call from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('call_delete')) {
            return abort(401);
        }
        $call = Call::findOrFail($id);
        $call->delete();

        return redirect()->route('calls.index');
    }

    /**
     * Delete all selected Call at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('call_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Call::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
