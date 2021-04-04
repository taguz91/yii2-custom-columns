<?php

namespace taguz91\CustomColumns\models;

use yii\base\InvalidConfigException;

class Message
{

  public $message;

  public function __construct(string $message)
  {
    if (empty($message)) {
      throw new InvalidConfigException('Attribute {message} is required');
    }
    $this->message = $message;
  }

  public function getMessage()
  {
    return $this->message;
  }
}
