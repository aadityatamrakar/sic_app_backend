<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dealer
 *
 * @package App
 * @property string $shop_name
 * @property string $first_name
 * @property string $last_name
 * @property string $mobile
 * @property string $phone
 * @property string $city
 * @property string $password
*/
class Dealer extends Model
{
    use SoftDeletes;

    protected $fillable = ['shop_name', 'first_name', 'last_name', 'mobile', 'phone', 'city', 'password'];
    
    
}
