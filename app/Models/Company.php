<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Routing\Loader\ProtectedPhpFileLoader;

class Company extends Model
{
    protected $guarded = [];

    public function customers()
    {

        return $this->hasMany(Customer::class);
    }
}
