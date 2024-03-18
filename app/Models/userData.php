<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userData extends Model
{
    use HasFactory;

    protected $table = 'user_data';

    protected $primaryKey = 'id';

    private $name;
    private $email;

    protected $fillable = [
        'name',
        'email',
    ];
}
