Nibble stand alone PHP Form and flash messaging classes
============================================

Nibble stand alone's are simple PHP classes or library's (collection of classes) that 
make developing easier.  The current two stand alone's available are:

* Nibble forms:  An easy to use PHP form class that can produce forms/fields from one or 
  two arguments depending on the field type.  More arguments are available to allow
  customisation of the forms produced.  Documentation is on the Nibble development site
  [here](http://nibble-development.com/nibble-forms "Nibble forms documentation").
* Nibble flash messaging:  A simple flash messaging class that allows messages
  to be created in a controller and outputted to the user in a "growl" like format.
  Messages can be created for the view about to be rendered, or for the next view
  after that.  Documentation is on the Nibble development site
  [here](http://nibble-development.com/flash-messaging "Nibble flash messaging documentation").

### Simple form example:

$form = NibbleForm::getInstance('', 'Submit this form','post',true,'flash');

  $form->username = new Text('Please enter your username', true, 20, '/[a-zA-Z0-9]+/');

  $form->email = new Email('Please enter your email');

  $form->email->addConfirmation('Please confirm your email');

  $form->password = new Password('Please enter your password', 11, true, true, 12);

  $form->password->addConfirmation('Please confirm your password');


### Simple flash example:

$flash = Flash::getInstance();

$flash->flashMessage('Message content goes here, 5s lifetime','Message title goes here',5000);

  
Hopefully one of these stand alones will make your day easier, both are served with the 
MIT license:

The Nibble framework and Nibble stand alone library's are licensed under the OSI - MIT License
http://www.opensource.org/licenses/mit-license.php

Copyright (c) 2010 Luke Rotherfield, Nibble Development

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
