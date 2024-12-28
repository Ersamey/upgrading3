<?php

namespace App\Controllers;

use PHPUnit\Event\Telemetry\Duration;
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

    public function pesan($id)
    {
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
        $data = [
            'title' => 'Balas Pesan',
            'id_anak' => $this->request->getGet('id_anak'),
        ];
        return view('balaspesan', $data);
    }

    public function savebalas()
    {
        $id_anak = $this->request->getPost('id_anak');
        $pengirim = $this->request->getPost('pengirim');
        $pesan = $this->request->getPost('pesan');
        $this->balasan->save([
            'id_anak' => $id_anak,
            'pengirim' => $pengirim,
            'pesan' => $pesan,
        ]);
        return redirect()->to('/pesan/' . $id_anak);
    }

    public function masuk()
    {
        $nim = $this->request->getPost('nim');
        $kode = $this->request->getPost('password');
        $anakbem = $this->anakBem->where('nim', $nim)->where('kode', $kode)->first();
        if ($anakbem) {
            return redirect()->to('/pesan/' . $anakbem['id']);
        }
        return redirect()->to('/');
    }
}
