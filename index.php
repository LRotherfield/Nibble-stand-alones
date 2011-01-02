<?php
  error_reporting(E_ALL | E_STRICT);
  ini_set('display_errors', 1);
  session_name('nibble');
  ini_set('session.gc_maxlifetime',30*60);
  session_set_cookie_params(30*60);
  session_start();
  include dirname(__FILE__).'/nibble-flash-messaging/Flash.class.php';
  $flash = Flash::getInstance();
  $flash->message('Simple message example');
  $flash->flashMessage('Message content goes here, 5s lifetime','Message title goes here',5000);
  $flash->message('Sticky error message','Sticky message',0,true,'error');
  include dirname(__FILE__).'/nibble-forms/NibbleForm.class.php';
  $form = NibbleForm::getInstance('', 'Submit this form','post',true,'flash');
  $form->username = new Text('Please enter your username', true, 20, '/[a-zA-Z0-9]+/');
  $form->email = new Email('Please enter your email');
  $form->email->addConfirmation('Please confirm your email');
  $form->password = new Password('Please enter your password', 11, true, true, 12);
  $form->password->addConfirmation('Please confirm your password');
  $form->radio = new Radio('Please select one of the following', array(
    'One' => 'Choice one, dont choose',
    'car' => 'Choice two',
    'Choice three'
  ),true,array('car'));
  $form->checkbox = new Checkbox('Please select one of the following', array(
    'One' => 'Choice one, dont choose',
    'car' => 'Choice two',
    'Choice three',
    'Choice four'
  ),true,2);
  $form->select = new MultipleSelect('Please select at least two of the following', array(
    'One'=>'Choice one',
    'Choice two',
    'Choice three'
  ),false,true,2);
  $form->file = new File('Please upload a file',array('image/png'),true);
  $form->addData(array(
    'username' => 'Luke',
    'radio' => 0,
    'checkbox' => array(1,'car')
  ));
  if(isset($_POST['submit'])){
    if($form->validate()){
      echo 'Valid';
    } else {
      echo 'Invalid';
    }
  }

?>
<!doctype html>
<html>
  <head>
    
    <title>Example flash messaging</title>
    <script src="http://www.google.com/jsapi" type="text/javascript"></script>
    <script type="text/javascript">google.load("jquery","1");google.load("jqueryui","1");</script>
    <script type="text/javascript" src="nibble-flash-messaging/notice.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="nibble-flash-messaging/style.css" />

  </head>
  <body>
  <?php echo $form->render() ?>
  <?php echo $flash->render() ?>
  </body>
</html>
