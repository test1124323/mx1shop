<?php

class aaa extends Eloquent{

    /** @var string Define database connection */
    public $connection = ‘bb'; 

    /** @var string Define table name */
    protected $table = ‘cc';

    /** @var boolean Turn off automatic maintaining the created_at and and updated_at columns */
    public $timestamps = false;

    /** @var array Protect primary key from modify */
    // protected $guarded = array('RunningNumber');

    protected $fillable = array();

    /** @var string Define field name of primary key */
    protected $primaryKey = ‘cate_id';

}
?>