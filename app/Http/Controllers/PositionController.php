<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function index(Agency $agency)
    {
        return view('position.table', [
            'positions' => Position::get(),
        ]);
    }

    public function show(Agency $agency, Position $position)
    {
        return view('agency.position.show', [
            'agency' => $agency,
            'position' => $position,
        ]);
    }

    public function create(Agency $agency)
    {
        return view('agency.position.create', [
            'position' => new Position,
            'agency' => $agency,
            'submit' => 'Create',
        ]);
    }

    public function store()
    {
        request()->validate([
            'position' => 'required',
        ]);

        $position = Position::create([
            'position' => request('position'),
            'agency_id' => request('agency_id'),
        ]);
        $agency = Agency::find(request('agency_id'));

        return redirect()->route('agency.detail', $agency);
    }

    public function edit(Agency $agency, Position $position)
    {
        return view('agency.position.edit', [
            'position' => $position,
            'agency' => $agency,
            'submit' => 'Update',
        ]);
    }

    public function update(Agency $agency, Position $position)
    {

        request()->validate([
            'name' => 'required',
        ]);

        $agency->position->update([
            'name' => request('name'),
        ]);

        return redirect()->route('position.table');
    }

    public function destroy(Agency $agency, Position $position)
    {
        $position->delete();
        return redirect()->route('agency.detail', $agency);
    }
}