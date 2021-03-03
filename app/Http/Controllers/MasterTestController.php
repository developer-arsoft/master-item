<?php

namespace App\Http\Controllers;

use ArsoftModules\NotaGenerator\Facades\NotaGenerator;
use Illuminate\Http\Request;

class MasterTestController extends Controller
{
    // --- start: nota generator
    public function generateNota(Request $request)
    {
        $nota = NotaGenerator::generate('orders', 'nota', 3)
            ->addPrefix('ORDERS')
            ->getResult();
        
        return "generated nota " . $nota;
    }
    // --- end: nota generator

    // --- start: master items
    public function listItems()
    {
        
    }
    // --- end: master items
}
