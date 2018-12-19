<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','name', 'email','function','insertion','date_of_birth','gender','street','zip','city','board_member','first_instrument',
        'booking_manager','honorary_board','tel','tel_business','tel_mobile','username','hash','access_level','status','account_number','deb_number',
        'email2','start_date','end_date','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'date_of_birth',
        'last_login',
        'start_date',
        'end_date'
    ];

    // methods

    public function getFullName()
    {
        return $this->firstname.' '.$this->insertion.' '.$this->name;
    }

    public function isAdmin()
    {
        return $this->access_level >= 99;
    }

    public function isActive()
    {
        return $this->status == 'actief';
    }

    // scopes

    public function scopeActive($query)
    {
        return $query->where('status', 'actief');
    }
    public static function getUsers()
    {
        return self::select('id','firstname','name','city','function','status','start_date','end_date')->get();
    }

    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getDateOfBirth()
    {
        return !is_null($this->date_of_birth)?$this->date_of_birth->format('Y/m/d'):'';
    }
    public function getStartDate()
    {
        return !is_null($this->start_date)?$this->start_date->format('Y/m/d'):'';
    }
    public function getEndDate()
    {
        return !is_null($this->end_date)?$this->end_date->format('Y/m/d'):'';
    }

    public function getAccessLevel()
    {
        switch($this->access_level) {
            case 0:
            default:
                return 'Geen toegang';
                break;

            case 11:
                return 'Spelend lid';
                break;

            case 33:
                return 'Niet-spelend lid';
                break;

            case 66:
                return 'Bestuur';
                break;

            case 88:
                return 'Bookings manager';
                break;

            case 99:
                return 'Dirigent / Admin';
                break;
        }
    }
    public function getStatus()
    {
        switch($this->status) {
            case 'actief':
                return 'Actief lid';
                break;

            case 'non-actief':
            default:
                return 'Non-actief lid';
                break;

            case 'niet-spelend':
                return 'Niet-spelend lid';
                break;

            case 'aankomend':
                return 'Aankomend lid / Kweekvijver';
                break;

            case 'afvalkweekvijver':
                return 'Afvaller kweekvijver';
                break;

            case 'wervingsdag':
                return 'Aanmelding wervingsdag';
                break;

            case 'afvalwervingsdag':
                return 'Afvaller wervingsdag';
                break;
        }
    }
}
