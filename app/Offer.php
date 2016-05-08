<?php namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Offer extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offers';

    /**
     * The attributes that can be set with Mass Assignment.
     *
     * @var array
     */
    protected $fillable = ['title', 'advertiser_id', 'creator_id', 'currency', 'amount', 'description', 'status'];

    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [
        'advertiser_id' => 'required',
        'creator_id' => 'required'
    ];

    public function statuses()
    {
        return $this->belongsToMany('App\Status');
    }

    public function assignStatus($statusId)
    {
        return $this->statuses()->attach($statusId);
    }

}
