<?php
namespace App\Models;

use CodeIgniter\Model;

class Produit extends Model
{
    protected $table = 'produit';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'designation', 'prix_unitaire'];

    public function assezDeStock(int $qt_achat, ?int $id = null): bool
    {
        if ($id === null) {
            if (empty($this->id)) {
                throw new \Exception('Aucun ID de produit fourni ou chargé.');
            }
            $id = $this->id;
        }

        $db = \Config\Database::connect();
        $builder = $db->table('mouvement_stock');
        $result = $builder->selectSum('quantite')
                          ->where('produit_id', $id)
                          ->get()
                          ->getRow();

        $stockActuel = (int)($result->quantite ?? 0);
        return $stockActuel >= $qt_achat;
    }  
}
      
?>