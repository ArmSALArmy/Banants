<?php
restrictAccess();

/**
 * Created by PhpStorm.
 * User: Arsen
 * Date: 11/27/2015
 * Time: 12:06 PM
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class EntityModel extends Eloquent
{
    public $timestamps = false;

    protected $table = 'entities';

    protected $fillable = ['text', 'is_bound'];

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($model) { // before delete() method call this

            $model->translations()->delete();
            // do the rest of the cleanup...
        });
    }

    public function translations()
    {
        return $this->hasMany('EntityTranslationModel', 'entity_id');
//        return $this->belongsTo('EntityTranslationModel', 'entity_id');
    }

//    protected $guarded = ['id'];
}