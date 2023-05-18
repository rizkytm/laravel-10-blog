<?php


namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class NewFeature extends Eloquent

{

	protected $connection = 'mongodb';

	protected $collection = 'new_features';


    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'title', 'content', 'thumbnail'

    ];

}