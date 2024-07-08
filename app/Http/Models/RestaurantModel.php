<?php


namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantModel extends Model
{
    use HasFactory;
    
    protected $table = 'restaurants';
    protected $fillable = ['name', 'description', 'image'];
    public $timestamps = true;
    public $incrementing = true;
    protected $primaryKey = 'id';
}
