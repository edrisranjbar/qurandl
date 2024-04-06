<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\AppHelper;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['key', 'value', 'name'];
    public function setValue($value)
    {
        $this->attributes['value'] = AppHelper::formatNumber($value);
    }
}
