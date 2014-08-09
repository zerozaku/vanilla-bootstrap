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

$CountAllowed = GetValue('CountAllowed', $this->Data, 0);
$CountNotAllowed = GetValue('CountNotAllowed', $this->Data, 0);
$CountCheckedDiscussions = GetValue('CountCheckedDiscussions', $this->Data, 0);

if ($CountNotAllowed > 0) {
   echo Wrap(sprintf(
      'You do not have permission to move %1$s of the selected discussions.',
      $CountNotAllowed
      ), 'p');

   echo Wrap(sprintf(
      'You are about to move %1$s of the %2$s of the selected discussions.',
      $CountAllowed,
      $CountCheckedDiscussions
      ), 'p');
} else {
echo Wrap(sprintf(
   'You are about to move %s.',
   Plural($CountCheckedDiscussions, '%s discussion', '%s discussions')
   ), 'p');
}
?>
<ul>
   <li>
      <?php
         echo '<p><div class="Category">';
         echo $this->Form->Label('Category', 'CategoryID'), ' ';
         echo $this->Form->CategoryDropDown();
         echo '</div></p>';
      ?>
   </li>
</ul>
<?php
echo $this->Form->Close('Move');
