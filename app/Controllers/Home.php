<?php

namespace App\Controllers;

use App\Models\anakBemModel;
use CodeIgniter\Controller;
use App\Models\pesanModel;
use App\Models\balasanModel;

class Home extends BaseController
{
    protected $anakBem;
    protected $pesan;
    protected $balasan;

    // buat constructor untuk memanggil model anakBemModel
    public function __construct()
    {
        $this->anakBem = new anakBemModel();
        $this->pesan = new pesanModel();
        $this->balasan = new balasanModel();
    }

    public function index(): string
    {
        return view('home');
    }

    public function pesan()
    {
        // Ambil ID anak dari sesi, jika ada
        $id = session()->get('id_anak');

        // Pastikan ID anak ada dalam sesi
        if (!$id) {
            return redirect()->to('/'); // Redirect jika ID tidak ditemukan
        }

        $anakbem = $this->anakBem->find($id);
        $pesan = $this->pesan->where('id_anak', $id)->first();

        $data = [
            'title' => 'Pesan',
            'nama' => $anakbem['nama_anak'],
            'pesan' => $pesan['pesan'],
            'id_anak' => $anakbem['id'],
        ];

        return view('pesan', $data);
    }

    public function balaspesan()
    {
        $id_anak = session()->get('id_anak');
        if (!$id_anak) {
            return redirect()->to('/'); // Redirect jika ID tidak ditemukan
        }

        $data = [
            'title' => 'Balas Pesan',
            'id_anak' => $id_anak,
        ];

        return view('balaspesan', $data);
    }

    public function savebalas()
    {
        // Ambil data dari form
        $id_anak = session()->get('id_anak'); // Ambil ID anak dari sesi
        $pengirim = $this->request->getPost('pengirim');
        $pesan = $this->request->getPost('pesan');

        // Simpan data balasan
        $this->balasan->save([
            'id_anak' => $id_anak,
            'pengirim' => $pengirim,
            'pesan' => $pesan,
        ]);

        // Redirect tanpa menampilkan ID anak di URL
        return redirect()->to('/pesan');
    }

    public function masuk()
    {
        $nim = $this->request->getPost('nim');
        $kode = $this->request->getPost('password');
        $anakbem = $this->anakBem->where('nim', $nim)->where('kode', $kode)->first();

        if ($anakbem) {
            // Simpan ID anak ke sesi
            session()->set('id_anak', $anakbem['id']);
        }

        return redirect()->to('/pesan'); // Redirect ke halaman pesan
    }
}
