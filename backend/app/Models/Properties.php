<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Properties
 * 
 * @property int $id
 * @property string $title
 * @property string $total
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at 
 * @package App\Models
 * 
 */

class Properties extends Model
{
    protected $table = 'properties';    
}
