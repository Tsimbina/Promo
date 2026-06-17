<?php 
namespace App\Models;


use CodeIgniter\Model;

class TypeMouvement extends Model
{
    protected $table = 'type_mouvement';
    protected $primaryKey = 'id';
    protected $allowedFields = ['code','libelle'];
}

?>