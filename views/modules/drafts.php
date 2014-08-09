<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

?>
<div class="Box BoxDrafts">
   <h4><?php echo T('My Drafts'); ?></h4>
   <ul class="PanelInfo PanelDiscussions">
      <?php foreach ($this->Data->Result() as $Draft) {
         $EditUrl = !is_numeric($Draft->DiscussionID) || $Draft->DiscussionID <= 0 ? '/post/editdiscussion/0/'.$Draft->DraftID : '/post/editcomment/0/'.$Draft->DraftID;
      ?>
      <li>
         <strong><?php echo Anchor($Draft->Name, $EditUrl); ?></strong>
         <?php echo Anchor(SliceString(Gdn_Format::Text($Draft->Body), 200), $EditUrl, 'DraftCommentLink'); ?>
      </li>
      <?php
      } 
      ?>
      <li class="ShowAll"><?php echo Anchor(T('↳ Show All'), 'drafts'); ?></li>
   </ul>
</div>
