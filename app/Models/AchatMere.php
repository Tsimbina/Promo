<?php 
namespace App\Models;

use CodeIgniter\Model;

class AchatMere extends Model{

    protected $table = 'achat_mere';
    protected $primaryKey = 'id';
    protected $allowedFields = ['caisse_id', 'date_achat', 'prix_total'];
}