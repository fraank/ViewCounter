<?php

namespace Fraank\ViewCounter;

class UserCounter extends \Eloquent {

  protected $table = 'user_counter';
  protected $fillable = array('class_name', 'object_id', 'user_id', 'action');

}