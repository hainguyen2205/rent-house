<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup_Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'method',
        'amount'
    ];
    public function user_info(){
        return $this->hasOne(User::class, 'id', 'id_user');
    }
    public function calculateMonthlyRevenue()
    {
        $monthlyRevenue = $this::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount) as revenue')
            ->where('status', 'success')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
        return $monthlyRevenue;
    }
}
