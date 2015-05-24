<?php

namespace Fraank\ViewCounter;
class LikeController extends \BaseController {

  /**
   * like-Action to call with class_name and object_id
   *
   * @return null
   */  
  public function like($class_name, $object_id)
  {
    $message = 'view_counter.messages.like.';
    $object = $class_name::find($object_id);

    if($object->like())
      $type = "success";
    else
      $type = "error";
    
    return \Redirect::back()->with($type, $message.$type);
  }
  
  /**
   * unlike-Action to call with class_name and object_id
   *
   * @return null
   */  
  public function unlike($class_name, $object_id)
  {
    $message = 'view_counter.messages.unlike.';
    $object = $class_name::find($object_id);

    if($object->unlike())
      $type = "success";
    else
      $type = "error";

    return \Redirect::back()->with($type, $message.$type);
  }

}