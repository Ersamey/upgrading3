<?php

namespace App\Models;

use CodeIgniter\Model;

class balasanModel extends Model
{
    protected $table = 'balasan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_anak', 'pengirim', 'pesan', 'id_pesan'];
}
