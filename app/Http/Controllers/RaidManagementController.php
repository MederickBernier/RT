<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaidManagementController extends Controller
{
    public function index(){
        return response()->json(['message' => 'Raid Management Page']);
    }
}
