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

echo '<div class="P">'.T('Where do you want to announce this discussion?').'</div>';

echo '<div class="P">', $this->Form->Radio('Announce', '@'.sprintf(T('In <b>%s.</b>'), $this->Data('Category.Name')), array('Value' => '2')), '</div>';
echo '<div class="P">', $this->Form->Radio('Announce', '@'.sprintf(T('In <b>%s</b> and recent discussions.'), $this->Data('Category.Name')), array('Value' => '1')), '</div>';
echo '<div class="P">', $this->Form->Radio('Announce', '@'.T("Don't announce."), array('Value' => '0')), '</div>';

echo '<div class="Buttons Buttons-Confirm">';
echo $this->Form->Button('OK');
echo $this->Form->Button('Cancel', array('type' => 'button', 'class' => 'Button Close'));
echo '<div>';
echo $this->Form->Close();
?>
