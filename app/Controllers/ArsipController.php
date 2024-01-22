<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\DesaModel;
use CodeIgniter\HTTP\RedirectResponse;

use Dompdf\Dompdf;
class ArsipController extends BaseController
{
    protected ArsipModel $arsip;
    protected DesaModel $desa ;
    public function __construct()
    {
        $this->arsip = new ArsipModel();
        $this->desa = new DesaModel();
    }

    public function index(): string
    {
        $dataSurat = $this->arsip->findAll();
        $page = [
            'title' => 'Daftar Surat',
            'head' => 'Daftar Surat',
            'dataSurat' => $dataSurat
        ];
        return view('adminPage/Surat/surat-list', $page);
    }
    public function create(): string
    {
        $page = [
            'title' => 'Buat Surat',
            'head' => 'Buat Surat'
        ];
        return view('adminPage/Surat/form-surat', $page);
    }

    public function insert()
    {
//        $Data = [];
        $content_surat = $this->request->getPost('data');
        $kop = $this->request->getFile('kop');

        // Pindahkan file ke folder uploads
        $kop->move(ROOTPATH . 'public/assets/images/kop_surat');

        $desa_id = 1;
        $content_dinamis = $this->createDynamicVariable($content_surat);

/*        eval("?>$content_dinamis<?php ");*/
        $newData = [
            'nama_surat' => $this->request->getPost('nama_surat'),
            'path_kop_surat' => $kop->getName(),
            'content_surat' => $content_dinamis,
            'id_desa' => $desa_id,
        ];
        $this->arsip->save($newData);
        return redirect()->to('surat')->with('message','Surat Ditambahkan');
//        return redirect()->to('surat/editor');
    }

    public function surat_masuk(): string
    {
        $page = [
            'title' => 'Surat Masuk',
            'head' => 'Surat Masuk'
        ];

        return view('adminPage/Surat/surat-masuk', $page);
    }

    public function surat($id) : string
    {
        $dataSurat = $this->arsip->find($id);
        $data = [
            'title' => $dataSurat['nama_surat'],
            'nama_surat' => $dataSurat['nama_surat'],
            'kop_path' => $dataSurat['path_kop_surat'],
            'content' => $dataSurat['content_surat']
        ];
        return view('component/content-surat',$data);
    }

    public function delete($id)
    {
        $this->arsip->delete($id);
        return redirect()->to('/surat');
    }

    public function SuratToPDF($id){
        $pdf_convert = new Dompdf();
        $arsip = $this->arsip->find($id);
        $kop_path = $arsip['path_kop_surat'];
        $imageData = file_get_contents('assets/images/kop_surat/' . $kop_path);
        $base64Image = base64_encode($imageData);
        $data = [
            'kop_surat' => $base64Image,
            'content' => $arsip['content_surat']
        ];

        $html = view('component/surat-pdf', $data);
        $pdf_convert->loadHtml($html);
        $pdf_convert->setPaper('A4', 'portrait');
        $pdf_convert->render();

        // Mengambil nama surat dan nama desa
        $nama_surat = $arsip['nama_surat'];
        $id_desa = $arsip['id_desa'];

        // Menggunakan id_desa untuk mendapatkan nama desa (gantilah dengan cara yang sesuai di aplikasi Anda)
        $nama_desa = $this->getNamaDesaById($id_desa);

        // Menggabungkan nama surat dan nama desa untuk digunakan sebagai nama file
        $filename = "$nama_surat - desa $nama_desa.pdf";

        $pdf_convert->stream($filename);
    }

    private function createDynamicVariable($args)
    {
        $pattern = '/\[(.*?)\]/';
        $replacement = '<?php $$1 ?>';
        return preg_replace_callback(
            $pattern,
            function ($matches) {
                // $matches[1] berisi teks di dalam kurung siku
                return "<?php echo \$$matches[1]; ?>";
            },
            $args
        );
    }
    private function getNamaDesaById($id_desa) {
         $desa = $this->desa->find($id_desa);
         return $desa['nama'];
    }
}