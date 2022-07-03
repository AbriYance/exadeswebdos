<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'actors';

    protected $fillable = ['sex_id','actnombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actorpeliculas()
    {
        return $this->hasMany('App\Models\Actorpelicula', 'act_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sexo()
    {
        return $this->hasOne('App\Models\Sexo', 'id', 'sex_id');
        // return $this->hasOne('App\Models\Sexo', 'id', 'sexnombre');
    }
    
}
