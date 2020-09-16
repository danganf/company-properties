<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Properties
 * 
 * @property int $id
 * @property string $sku
 * @property string $title
 * @property string $price
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at 
 * @package App\Models
 * 
 */

class Properties extends Model
{
    const STATUS = [
        'available' => 'Disponível',
        'sold' => 'Vendido',
        'rented' => 'Alugado',
        'unavailable'=> 'Indisponível',
    ];
    
    protected $table = 'properties';    
}
