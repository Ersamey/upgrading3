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
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Balas Pesan',
            'id_anak' => $id_anak,
        ];

        return view('balaspesan', $data);
    }

    public function savebalas()
    {
        $id_anak = session()->get('id_anak');
        $pengirim = $this->request->getPost('pengirim');
        $pesan = $this->request->getPost('pesan');
        $this->balasan->save([
            'id_anak' => $id_anak,
            'pengirim' => $pengirim,
            'pesan' => $pesan,
        ]);
        return redirect()->to('/pesan');
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
        // ganti sesuai id ny dellap dan frank
        if ($anakbem['id'] == 3 || $anakbem['id'] == 4) {
            return redirect()->to('/adm/kirim');
        }
        return redirect()->to('/admin');
    }

    public function kirim()
    {
        $anakbem = $this->anakBem->findAll();
        $pengirim = $this->anakBem->where('id', session()->get('id_anak'))->first();
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
}
