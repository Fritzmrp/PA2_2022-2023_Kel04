<?php

namespace App\Http\Controllers\Staff;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;


class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pengaduan = DB::table('pengaduans')
                ->join('users', 'users.id', '=', 'pengaduans.user_id')
                ->select('pengaduans.*', 'users.namalengkap')
                ->paginate(3);
            // dd('pengaduans');
            return view('pages.staff.historypengaduan.list', compact('pengaduan'));
        }
        $pengaduan = Pengaduan::all();
        return view('pages.staff.historypengaduan.main', ['pengaduan' => $pengaduan]);
    }

    // public function show()
    // {

    //     $kritik = KritikSaran::all(); // Ganti dengan model dan query yang sesuai dengan data history meja Anda

    //     $pdf = PDF::loadView('pages.admin.kritik.pdf', compact('kritik'));

    //     return $pdf->download('history_kritik.pdf');
    // }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pengaduan yang disampaikan oleh User berhasil dihapus',
        ]);
    }
}
