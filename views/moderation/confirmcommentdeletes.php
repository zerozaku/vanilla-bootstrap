<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/

?>
<h1><?php echo $this->Data('Title'); ?></h1>
<?php
echo $this->Form->Open();
echo $this->Form->Errors();

$CountCheckedComments = GetValue('CountCheckedComments', $this->Data, 0);
echo Wrap(sprintf(
   T('AboutToDelete', 'You are about to delete %s.'),
   Plural($CountCheckedComments, '%s comment', '%s comments')
   ), 'p');

echo '<p><strong>'.T('Are you sure you wish to continue?').'</strong></p>';

echo '<div class="Buttons Buttons-Confirm">',
   $this->Form->Button('OK', array('class' => 'Button Primary')),
   $this->Form->Button('Cancel', array('type' => 'button', 'class' => 'Button Close')),
   '</div>';

echo $this->Form->Close();
