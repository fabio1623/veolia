<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContributorReference extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contributor_reference';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function contributor()
    {
    	return $this->belongsTo('App\Contributor');
    }

    public function reference()
    {
    	return $this->belongsTo('App\Reference');
    }
}
