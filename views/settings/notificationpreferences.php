<?php if (!defined('APPLICATION')) return;

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

?>
<h3><?php echo T('Category Notifications'); ?></h3>
<div class="Info">
   <?php
   echo T('You can follow individual categories and be notified of all posts within them.');
   ?>
</div>
<table class="PreferenceGroup">
   <thead>
      <tr>
         
         <td style="border: none;">&nbsp;</td>
         <td class="TopHeading" colspan="2"><?php echo T('Discussions'); ?></td>
         <td class="TopHeading" colspan="2"><?php echo T('Comments'); ?></td>
      </tr>
      <tr>
         <td style="text-align: left;"><?php echo T('Category'); ?></td>
         <td class="PrefCheckBox BottomHeading"><?php echo T('Email'); ?></td>
         <td class="PrefCheckBox BottomHeading"><?php echo T('Popup'); ?></td>
         <td class="PrefCheckBox BottomHeading"><?php echo T('Email'); ?></td>
         <td class="PrefCheckBox BottomHeading"><?php echo T('Popup'); ?></td>
      </tr>
   </thead>
   <tbody>
      <?php 
      foreach (Gdn::Controller()->Data('CategoryNotifications') as $Category): 
         $CategoryID = $Category['CategoryID'];
      
         if ($Category['Heading']):
         ?>
         <tr>
            <th>
               <b><?php echo $Category['Name']; ?></b>
            </th>
            <th colspan="4">
               &#160;
            </th>
         </tr>
         <?php else: ?>
         <tr>
            <td class="<?php echo "Depth_{$Category['Depth']}"; ?>"><?php echo $Category['Name']; ?></td>
            <td class="PrefCheckBox"><?php echo Gdn::Controller()->Form->CheckBox("Email.NewDiscussion.{$CategoryID}", '', array('value' => 1)); ?></td>
            <td class="PrefCheckBox"><?php echo Gdn::Controller()->Form->CheckBox("Popup.NewDiscussion.{$CategoryID}", '', array('value' => 1)); ?></td>
            <td class="PrefCheckBox"><?php echo Gdn::Controller()->Form->CheckBox("Email.NewComment.{$CategoryID}", '', array('value' => 1)); ?></td>
            <td class="PrefCheckBox"><?php echo Gdn::Controller()->Form->CheckBox("Popup.NewComment.{$CategoryID}", '', array('value' => 1)); ?></td>
         </tr>
      <?php 
         endif;
      endforeach; 
      ?>
   </tbody>
</table>
