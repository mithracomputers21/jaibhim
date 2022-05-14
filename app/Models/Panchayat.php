<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Panchayat extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'panchayats';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'block_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
