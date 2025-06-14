<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DipaMenu extends Model
{
    protected $table = 'dipa_menu';

    protected $fillable = [
        'name', 'type', 'url', 'icon', 'parent_id', 'is_active', 'order_index',
    ];

    public function roles()
    {
        return $this->belongsToMany(\Spatie\Permission\Models\Role::class, 'dipa_menu_role', 'menu_id', 'role_id');
    }

    public function children()
    {
        return $this->hasMany(DipaMenu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(DipaMenu::class, 'parent_id');
    }
}
