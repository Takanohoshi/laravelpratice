<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('home', compact('buku'));
    }

    public function detail($id)
    {
        $buku = Buku::findOrFail($id);
        $user = auth()->user();
        $ulasan = Ulasan::where('bookID', $id)->get();

        $statusPeminjaman = 'dikembalikan';
    
        if ($user) {
            $peminjamanAktif = Peminjaman::where('bukuID', $id)
                                ->where('userID', $user->id)
                                ->whereIn('status', ['dipinjam', 'dikembalikan'])
                                ->latest()
                                ->first();
    
            if ($peminjamanAktif && $peminjamanAktif->status == 'dipinjam') {
                $statusPeminjaman = 'dipinjam';
            }
        }
    
        return view('detail', compact('buku', 'statusPeminjaman', 'ulasan'));
    }
}