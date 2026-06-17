<?php
namespace App\Models;

use CodeIgniter\Model;

class Produit extends Model
{
    protected $table = 'produit';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'designation', 'prix_unitaire'];
}

?>