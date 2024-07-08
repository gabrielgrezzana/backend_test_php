<?php


namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotationModel extends Model
{
    use HasFactory;
    
    protected $table = 'votation';
    protected $fillable = ['user_id', 'restaurant_id'];
    public $timestamps = true;
    public $incrementing = true;
    protected $primaryKey = 'id';
}
