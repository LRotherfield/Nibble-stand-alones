<?php

class Flash {

  public static $instance;
  public $messages = array();

  public function __construct() {
    if (isset($_SESSION['flash']))
      $this->messages = $_SESSION['flash'];
    $_SESSION['flash'] = array();
  }

  public static function getInstance() {
    if (!self::$instance)
      self::$instance = new Flash();
    return self::$instance;
  }

  public function message($message, $title = 'System message', $stayTime = 5000, $sticky = false, $type = "notice") {
    array_push($this->messages, $this->create($message, $title, $stayTime, $sticky, $type));
  }

  public function flashMessage($message, $title = 'System message', $stayTime = 5000, $sticky = false, $type = "notice") {
    array_push($_SESSION['flash'], $this->create($message, $title, $stayTime, $sticky, $type));
  }

  private function create($message, $title, $stayTime, $sticky, $type) {
    return <<<MESSAGE
    <div class="message">
      <input type="hidden" name="title" value="$title" />
      <input type="hidden" name="message" value="$message" />
      <input type="hidden" name="stayTime" value="$stayTime" />
      <input type="hidden" name="stay" value="$sticky" />
      <input type="hidden" name="type" value="$type" />
    </div>
MESSAGE;
  }
  
  public function render(){
    return implode("\n",$this->messages);
  }

}
