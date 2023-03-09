<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order1',
        'order2',
        'order3',
        'order4',
        'order5',
        'order6',
        'order7',
        'order8',
        'order9',
        'order10',
        'order11',
        'order12',
        'order13',
        'order14',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
