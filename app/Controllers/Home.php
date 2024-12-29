<?php

namespace App\Controllers;

use App\Models\anakBemModel;
use CodeIgniter\Controller;
use App\Models\pesanModel;
use App\Models\balasanModel;
use App\Models\TanggapanModel;

class Home extends BaseController
{
    protected $anakBem;
    protected $pesan;
    protected $balasan;
    protected $tanggapan;

    public function __construct()
    {
        $this->anakBem = new anakBemModel();
        $this->pesan = new pesanModel();
        $this->balasan = new balasanModel();
        $this->tanggapan = new TanggapanModel();
    }

    public function index(): string
    {
        return view('home');
    }

    public function admin()
    {
        return view('admin');
    }

    public function pesan()
    {
        $id = session()->get('id_anak');
        if (!$id) {
            return redirect()->to('/');
        }

        $anakbem = $this->anakBem->find($id);
        $pesan = $this->pesan->where('id_anak', $id)->first();

        if (!$pesan) {
            return redirect()->to('/')->with('error', 'Pesan tidak ditemukan');
        }

        // Ambil balasan dan tanggapan
        $balasan = $this->balasan->where('id_pesan', $pesan['id'])->findAll();
        foreach ($balasan as &$balas) {
            $balas['tanggapan'] = $this->tanggapan->select('tanggapan_balasan.*, anak_bem.nama_anak as nama_admin')
                ->join('anak_bem', 'tanggapan_balasan.id_admin = anak_bem.id')
                ->where('id_balasan', $balas['id'])
                ->findAll();
        }

        $data = [
            'title' => 'Pesan',
            'nama' => $anakbem['nama_anak'],
            'pesan' => $pesan['pesan'],
            'id_anak' => $anakbem['id'],
            'id_pesan' => $pesan['id'],
            'balasan' => $balasan
        ];

        return view('pesan', $data);
    }

    public function balaspesan()
    {
        $id_anak = session()->get('id_anak');
        if (!$id_anak) {
            return redirect()->to('/');
        }

        $id_pesan = $this->request->getPost('id_pesan');
        // Ambil data anak_bem untuk mendapatkan nama
        $anakbem = $this->anakBem->find($id_anak);

        $data = [
            'title' => 'Balas Pesan',
            'id_anak' => $id_anak,
            'id_pesan' => $id_pesan,
            'nama_anak' => $anakbem['nama_anak']
        ];

        return view('balaspesan', $data);
    }

    public function savebalas()
    {
        $id_anak = session()->get('id_anak');
        $id_pesan = $this->request->getPost('id_pesan');
        $pengirim = $this->request->getPost('pengirim');
        $pesan = $this->request->getPost('pesan');

        try {
            // Cek apakah id_pesan ada
            $pesanExists = $this->pesan->find($id_pesan);
            if (!$pesanExists) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Pesan tidak ditemukan'
                ]);
            }

            // Simpan balasan
            $this->balasan->save([
                'id_anak' => $id_anak,
                'pengirim' => $pengirim,
                'pesan' => $pesan,
                'id_pesan' => $id_pesan
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Pesan balasan berhasil terkirim!'
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim pesan'
            ]);
        }
    }

    public function masuk()
    {
        $nim = $this->request->getPost('nim');
        $kode = $this->request->getPost('password');
        $anakbem = $this->anakBem->where('nim', $nim)->where('kode', $kode)->first();

        if ($anakbem) {
            session()->set('id_anak', $anakbem['id']);
        }

        return redirect()->to('/pesan');
    }

    public function adminmasuk()
    {
        $nim = $this->request->getPost('nim');
        $kode = $this->request->getPost('password');
        $anakbem = $this->anakBem->where('nim', $nim)->where('kode', $kode)->first();

        // Cek apakah user ditemukan dan apakah admin
        if ($anakbem && in_array($anakbem['id'], [3, 4])) {
            session()->set('id_anak', $anakbem['id']);
            return redirect()->to('/adm/kirim');
        }

        return redirect()->to('/admin')->with('error', 'Login gagal');
    }

    public function kirim()
    {
        $id_anak = session()->get('id_anak');
        if (!$id_anak) {
            return redirect()->to('/admin');
        }

        $anakbem = $this->anakBem->findAll();
        $pengirim = $this->anakBem->find($id_anak);

        if (!$pengirim) {
            return redirect()->to('/admin')->with('error', 'Data pengirim tidak ditemukan');
        }

        $data = [
            'anakbem' => $anakbem,
            'pengirim' => $pengirim
        ];
        return view('createPesan', $data);
    }

    public function savepesan()
    {
        $id_pengirim = $this->request->getPost('id_pengirim');
        $id_anak = $this->request->getPost('id_anak');
        $pesan = $this->request->getPost('pesan');

        $this->pesan->save([
            'id_anak' => $id_anak,
            'pesan' => $pesan,
            'id_pengirim' => $id_pengirim
        ]);

        return redirect()->to('/adm/kirim');
    }

    public function saveanak()
    {
        $nama_anak = $this->request->getPost('nama_anak');
        $nim = $this->request->getPost('nim');
        $kode = $this->request->getPost('kode');

        $this->anakBem->save([
            'nama_anak' => $nama_anak,
            'nim' => $nim,
            'kode' => $kode
        ]);

        return redirect()->to('/adm/kirim');
    }

    public function addPerson()
    {
        return view('add_person');
    }

    public function allpesan()
    {
        $allPesan = $this->pesan->select('pesan.*, pengirim.nama_anak as nama_pengirim, penerima.nama_anak as nama_penerima, pesan.id as pesan_id')
            ->join('anak_bem as pengirim', 'pesan.id_pengirim = pengirim.id')
            ->join('anak_bem as penerima', 'pesan.id_anak = penerima.id')
            ->findAll();

        foreach ($allPesan as &$pesan) {
            $pesan['balasan'] = $this->balasan->where('id_pesan', $pesan['id'])->findAll();

            // Ambil tanggapan untuk setiap balasan
            foreach ($pesan['balasan'] as &$balasan) {
                $balasan['tanggapan'] = $this->tanggapan->select('tanggapan_balasan.*, anak_bem.nama_anak as nama_admin')
                    ->join('anak_bem', 'tanggapan_balasan.id_admin = anak_bem.id')
                    ->where('id_balasan', $balasan['id'])
                    ->findAll();
            }
        }

        $data = [
            'pesanList' => $allPesan,
            'is_admin' => in_array(session()->get('id_anak'), [3, 4])
        ];

        return view('all_pesan', $data);
    }

    public function savetanggapan()
    {
        $id_admin = session()->get('id_anak');
        if (!in_array($id_admin, [3, 4])) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $this->tanggapan->save([
            'id_balasan' => $this->request->getPost('id_balasan'),
            'id_admin' => $id_admin,
            'tanggapan' => $this->request->getPost('tanggapan')
        ]);

        return redirect()->to('/adm/allpesan');
    }
}
