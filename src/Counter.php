<?php

namespace Fraank\ViewCounter;

class Counter extends \Eloquent {

  protected $table = 'counter';
  protected $fillable = array('class_name', 'object_id');

}