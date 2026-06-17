<?php
namespace App\Models;

use CodeIgniter\Model;

class MouvementStock extends Model
{
    protected $table = 'mouvement_stock';
    protected $primaryKey = 'id';
    protected $allowedFields = ['produit_id', 'code_mouvement', 'quantite'];
}

