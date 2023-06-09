<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Furigana',
        'year',
        'month',
        'day',
        'gender',
        'emailConfirm',
        'preferContact',
        'LINEID',
        'postCodeBef',
        'postCodeAfter',
        'district',
        'city',
        'address',
        'apartmentName',
        'postCodeComBef',
        'postCodeComAfter',
        'districtCom',
        'cityCom',
        'addressCom',
        'apartmentNameCom',
        'telephoneCom',
        'bankName',
        'branchName',
        'teleBranch',
        'typeAccount',
        'account',
        'accountName',
        'avatarUser',
        'frontCardUser',
        'afterCardUser',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
