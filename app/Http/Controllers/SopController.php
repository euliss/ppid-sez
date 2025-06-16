<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Illuminate\Http\Request;

class SopController extends Controller
{
    // READ all
    public function index()
    {
        $sops = Sop::all();
        $pageName = 'Daftar SOP';
        return view('standar.sop', [
            'sops' => $sops,
            'pageName'=> $pageName,
        ]);
    }

    // SEARCH + FILTER (by title, status)
    public function search(Request $request)
    {
        $query = Sop::query();

        if ($request->has('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $results = $query->get();

        return response()->json($results);
    }

    // CREATE
    public function create()
    {
    return view('sop-create');
    }
    // STORE
    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'file' => 'required|file|mimes:pdf|max:2048',
        'status' => 'nullable|string|in:Aktif,Nonaktif',
    ]);

    // Simpan file ke storage
    $filePath = $request->file('file')->store('sops', 'public');

    $sop = Sop::create([
        'title' => $request->title,
        'file' => $filePath, // Simpan path file di database
        'status' => $request->has('status') ? 'Aktif' : 'Nonaktif',
    ]);

    return redirect()->route('sops.index')->with('success', 'SOP berhasil ditambahkan.');
    }

    // READ by ID
    public function show($id)
    {
        $sop = Sop::findOrFail($id);
        return response()->json($sop);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $sop = Sop::findOrFail($id);

        $sop->update($request->only(['title', 'file', 'status']));

        return response()->json($sop);
    }

    // DELETE
    public function destroy($id)
    {
        $sop = Sop::findOrFail($id);
        $sop->delete();

        return response()->json(['message' => 'SOP deleted successfully']);
    }

    // SWITCH ON/OFF (aktif/nonaktif)
    public function switchStatus($id)
    {
        $sop = Sop::findOrFail($id);

        $sop->status = ($sop->status === 'aktif') ? 'nonaktif' : 'aktif';
        $sop->save();

        return response()->json([
            'message' => 'Status updated successfully',
            'new_status' => $sop->status,
        ]);
    }
}
