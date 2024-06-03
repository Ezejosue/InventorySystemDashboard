<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'Suppliers';
    protected $fillable = ['name', 'phone', 'email'];
}
