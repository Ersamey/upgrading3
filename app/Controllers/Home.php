<?php

namespace App\Controllers;

use PHPUnit\Event\Telemetry\Duration;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function pesan()
    {
        $data = [
            'title' => 'Pesan',
            'nama' => 'Rizky Khapidsyah',
            'pesan' => 'Ini adalah pesan dari controller Home'
        ];
        return view('pesan', $data);
    }
}
