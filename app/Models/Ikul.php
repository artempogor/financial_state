<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Ikul extends Model
{
    use HasFactory;
    protected $table = 'ikuls';
    protected $fillable = ['ikul', 'type_of_organization', 'full_company_name', 'short_company_name',
        'reg_number','location','director_fio','accountant_fio','special_official_fio','responsible_actuary'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getIkul()
    {
        return $this->ikul;
    }
}
