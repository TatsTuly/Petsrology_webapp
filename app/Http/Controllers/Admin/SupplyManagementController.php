<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodProduct;
use App\Models\ToyProduct;
use Illuminate\Http\Request;

class SupplyManagementController extends Controller
{
    public function index()
    {
        $foodProducts = FoodProduct::all();
        $toyProducts = ToyProduct::all();
        return view('admin.supply_management.index', compact('foodProducts', 'toyProducts'));
    }
}
