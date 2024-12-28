<?php

namespace App\Models;

use CodeIgniter\Model;

class pesanModel extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_anak', 'pesan'];
}
