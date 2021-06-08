<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Member;

class Team extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'teams';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'password',
        'category',
        'referrer',
        'payment_proof_file_path',
        'submission_file_path',
        'payment_status',
        'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function members() {
        return $this->hasMany(Member::class);
    }
    
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('id','like','%'.$val.'%')
        ->Orwhere('name','like','%'.$val.'%');
    }
}
