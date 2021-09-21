<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Pagination\Paginator;
use DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'users';
    protected $fillable = [
        'mail_address',
        'password',
        'name',
        'address',
        'phone'
    ];
    protected $perPage = 20;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getByUser()
    {
        $user = new User();
        $list = DB::table('users')
                            ->orderBy('mail_address', 'asc')
                            ->paginate($user->perPage);
        return $list;
    }
    public static function createUser($data)
    {
        $user = DB::table('users')->insert([
            'mail_address' => $data['mail_address'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone']
        ]);

        return $user ;
    }
}
