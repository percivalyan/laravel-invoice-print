<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function print()
    {
        return view('penawaran.print'); // Menampilkan halaman print.blade.php
    }

    public function penawaran()
    {
        return view('penawaran.penawaran'); // Menampilkan halaman pewarnaan.blade.php
    }
}
