<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingPackageController extends Controller
{
    public function index()
    {
        return view('menu.training_packages');
    }
}