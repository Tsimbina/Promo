<?php
 namespace App\Models;

 use CodeIgniter\Model;
 class AchatFille extends Model
 {
     protected $table = 'achat_fille';
     protected $primaryKey = 'id';
     protected $allowedFields = ['achat_mere_id', 'produit_id', 'quantite', 'prix_unitaire'];
 }