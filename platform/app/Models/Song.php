<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Song
 * @package App\Models
 * @property int $id
 * @property string $email
 * @property string $name
 * @property int $last_duration
 * @property int $total_duration
 * @property string $last_ip_address
 */
class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'last_duration',
        'total_duration',
        'last_ip_address',
    ];
}
