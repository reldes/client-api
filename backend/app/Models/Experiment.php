<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    use HasFactory;
    public $fillable = ['title', 'description', 'template_id'];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
