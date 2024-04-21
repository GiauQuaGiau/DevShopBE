<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class menu extends Model
{
    // use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'icon',
        'linkTo',
        'parent_id',
        'status',
        'created_at',
        'updated_at',
    ];
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}
