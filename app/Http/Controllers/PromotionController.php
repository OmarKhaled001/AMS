<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Interface\Students\StudentPromotionRepositoryInterface;

class PromotionController extends Controller
{
    protected $Promotions;

    public function __construct(StudentPromotionRepositoryInterface $Promotions)
    {
        $this->Promotions = $Promotions;
    }

    public function index()
    {
        return  $this->Promotions->allPromotion();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  $this->Promotions->addForm();
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
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
