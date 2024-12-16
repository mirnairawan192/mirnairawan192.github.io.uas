namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data pegawai dari database
        $query = Pegawai::query();

        // Jika ada pencarian berdasarkan nama pegawai
        if ($request->has('search') && $request->search !== null) {
            $query->where('nama_pegawai', 'like', '%' . $request->search . '%');
        }

        $dataPegawai = $query->get();

        // Kirim data ke view
        return view('pegawai.index', compact('dataPegawai'));
    }

    // Tambahkan metode lainnya (create, store, edit, update, destroy)
}
