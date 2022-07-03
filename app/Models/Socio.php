<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'socios';

    protected $fillable = ['soccedula','socnombre','socdireccion','soctelefono','soccorreo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alquilers()
    {
        return $this->hasMany('App\Models\Alquiler', 'soc_id', 'id');
    }
    
}
