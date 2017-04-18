<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Call
 *
 * @package App
 * @property string $type
 * @property string $brand
 * @property string $product
 * @property string $model
 * @property string $serial_no
 * @property string $customer_name
 * @property string $customer_mobile
 * @property string $customer_phone
 * @property string $customer_address
 * @property text $complain
 * @property text $remarks
 * @property string $bill
 * @property string $dealer
*/
class Call extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'brand', 'product', 'model', 'serial_no', 'customer_name', 'customer_mobile', 'customer_phone', 'customer_address', 'complain', 'remarks', 'bill', 'dealer_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setDealerIdAttribute($input)
    {
        $this->attributes['dealer_id'] = $input ? $input : null;
    }
    
    public function dealer()
    {
        return $this->belongsTo(Dealer::class, 'dealer_id')->withTrashed();
    }
    
}
