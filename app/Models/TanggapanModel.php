<?php

namespace App\Models;

use CodeIgniter\Model;

class TanggapanModel extends Model
{
    protected $table = 'tanggapan_balasan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_balasan', 'id_admin', 'tanggapan'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = '';
}