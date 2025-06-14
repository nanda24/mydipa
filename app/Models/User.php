<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $table = 'dipa_users';

    protected $fillable = [
        'username', 'password', 'full_name', 'dipa_company_id', 'is_active',
    ];

    protected $hidden = ['password'];

    public function company()
    {
        return $this->belongsTo(DipaCompany::class);
    }
}

