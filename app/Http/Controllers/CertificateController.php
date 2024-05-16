<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::all();
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $pagedData = new LengthAwarePaginator(
            $certificates->forPage($currentPage, $perPage),
            $certificates->count(),
            $perPage,
            $currentPage,
            ['path' => route('certificats.index')]
        );
        // dd($certificates[0]->course());
        // dd($courses);
        return view('certificats.index', compact('pagedData', 'certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('certificats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        return view('certificats.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return view('certificats.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}