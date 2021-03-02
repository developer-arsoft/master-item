<?php

namespace App\Http\Controllers;

use ArsoftModules\NotaGenerator\NotaGenerator;
use Illuminate\Http\Request;

class MasterTestController extends Controller
{
    // --- start: nota generator
    public function generateNota(Request $request)
    {
        $notaGenerator = new NotaGenerator();
        $nota = $notaGenerator->generate('item');
        return "generated nota " . $nota;
    }
    // --- end: nota generator


}
