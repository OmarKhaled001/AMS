<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Interface\Sections\SectionRepositoryInterface;

class SectionController extends Controller
{
    protected $Sections;

    public function __construct(SectionRepositoryInterface $Sections)
    {
        $this->Sections = $Sections;
    }

    public function index()
    {
        return  $this->Sections->allSection();
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  $this->Sections->allClassroom();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->Sections->createSection( $request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return  $this->Sections->updateSection( $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return  $this->Sections->destroySection( $id);
    }
}
