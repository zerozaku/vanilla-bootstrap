<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/

$Count = array(1, 2, 3, 4, 5, 10, 15, 20, 25, 30);
$Time = array(30, 60, 90, 120, 240);
$Lock = array(30, 60, 90, 120, 240);
$SpamCount = ArrayCombine($Count, $Count);
$SpamTime = ArrayCombine($Time, $Time);
$SpamLock = ArrayCombine(array(60, 120, 180, 240, 300, 600), array(1, 2, 3, 4, 5, 10));
echo $this->Form->Open();
echo $this->Form->Errors();
?>
<h1><?php echo T('Flood Control'); ?></h1>
<div class="Info"><?php echo T('Prevent spam on your forum by limiting the number of discussions &amp; comments that users can post within a given period of time.'); ?></div>
<table class="AltColumns">
   <thead>
      <tr>
         <th><?php echo T('Only Allow Each User To Post'); ?></th>
         <th class="Alt"><?php echo T('Within'); ?></th>
         <th><?php echo T('Or Spamblock For'); ?></th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <?php echo $this->Form->DropDown('Vanilla.Discussion.SpamCount', $SpamCount); ?>
            <?php echo T('discussion(s)'); ?>
         </td>
         <td class="Alt">
            <?php echo $this->Form->DropDown('Vanilla.Discussion.SpamTime', $SpamTime); ?>
            <?php echo T('seconds'); ?>
         </td>
         <td>
            <?php echo $this->Form->DropDown('Vanilla.Discussion.SpamLock', $SpamLock); ?>
            <?php echo T('minute(s)'); ?>
         </td>
      </tr>
      <tr>
         <td>
            <?php echo $this->Form->DropDown('Vanilla.Comment.SpamCount', $SpamCount); ?>
            <?php echo T('comment(s)'); ?>
         </td>
         <td class="Alt">
            <?php echo $this->Form->DropDown('Vanilla.Comment.SpamTime', $SpamTime); ?>
            <?php echo T('seconds'); ?>
         </td>
         <td>
            <?php echo $this->Form->DropDown('Vanilla.Comment.SpamLock', $SpamLock); ?>
            <?php echo T('minute(s)'); ?>
         </td>
      </tr>
   </tbody>
</table>
<ul>
   <li>
      <div class="Info"><?php echo T("It is a good idea to keep the maximum number of characters allowed in a comment down to a reasonable size."); ?></div>
   </li>
   <li>
      <?php
         echo $this->Form->Label('Max Comment Length', 'Vanilla.Comment.MaxLength');
         echo $this->Form->TextBox('Vanilla.Comment.MaxLength', array('class' => 'InputBox SmallInput'));
      ?>
   </li>
</ul>
<?php echo $this->Form->Close('Save');
