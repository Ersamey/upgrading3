<?php

namespace App\Models;

use CodeIgniter\Model;

class anakBemModel extends Model
{
    protected $table = 'anak_bem';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'nama_anak', 'kode'];
}
