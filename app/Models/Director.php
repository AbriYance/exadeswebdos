<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'directors';

    protected $fillable = ['dirnombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peliculas()
    {
        return $this->hasMany('App\Models\Pelicula', 'dir_id', 'id');
    }
    
}
