<?php

namespace App\Http\Controllers;

use App\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreDealersRequest;
use App\Http\Requests\UpdateDealersRequest;

class DealersController extends Controller
{
    /**
     * Display a listing of Dealer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('dealer_access')) {
            return abort(401);
        }
        $dealers = Dealer::all();

        return view('dealers.index', compact('dealers'));
    }

    /**
     * Show the form for creating new Dealer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('dealer_create')) {
            return abort(401);
        }
        return view('dealers.create');
    }

    /**
     * Store a newly created Dealer in storage.
     *
     * @param  \App\Http\Requests\StoreDealersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDealersRequest $request)
    {
        if (! Gate::allows('dealer_create')) {
            return abort(401);
        }
        $dealer = Dealer::create($request->all());

        return redirect()->route('dealers.index');
    }


    /**
     * Show the form for editing Dealer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('dealer_edit')) {
            return abort(401);
        }
        $dealer = Dealer::findOrFail($id);

        return view('dealers.edit', compact('dealer'));
    }

    /**
     * Update Dealer in storage.
     *
     * @param  \App\Http\Requests\UpdateDealersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDealersRequest $request, $id)
    {
        if (! Gate::allows('dealer_edit')) {
            return abort(401);
        }
        $dealer = Dealer::findOrFail($id);
        $dealer->update($request->all());

        return redirect()->route('dealers.index');
    }


    /**
     * Display Dealer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('dealer_view')) {
            return abort(401);
        }
        $relations = [
            'calls' => \App\Call::where('dealer_id', $id)->get(),
        ];

        $dealer = Dealer::findOrFail($id);

        return view('dealers.show', compact('dealer') + $relations);
    }


    /**
     * Remove Dealer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('dealer_delete')) {
            return abort(401);
        }
        $dealer = Dealer::findOrFail($id);
        $dealer->delete();

        return redirect()->route('dealers.index');
    }

    /**
     * Delete all selected Dealer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('dealer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Dealer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
