<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/

$Session = Gdn::Session();
$ShowOptions = TRUE;
$Alt = '';
foreach ($this->DraftData->Result() as $Draft) {
	$Offset = GetValue('CountComments', $Draft, 0);
	if($Offset > C('Vanilla.Comments.PerPage', 30)) {
		$Offset -= C('Vanilla.Comments.PerPage', 30);
	} else {
		$Offset = 0;
	}
	
   $EditUrl = !is_numeric($Draft->DiscussionID) || $Draft->DiscussionID <= 0 ? '/post/editdiscussion/0/'.$Draft->DraftID : '/discussion/'.$Draft->DiscussionID.'/'.$Offset.'/#Form_Comment';
   $Alt = $Alt == ' Alt' ? '' : ' Alt';
   ?>
   <li class="Item Draft<?php echo $Alt; ?>">
      <div class="Options"><?php echo Anchor(T('Draft.Delete', 'Delete'), 'vanilla/drafts/delete/'.$Draft->DraftID.'/'.$Session->TransientKey().'?Target='.urlencode($this->SelfUrl), 'Delete'); ?></div>
      <div class="ItemContent">
         <?php echo Anchor(Gdn_Format::Text($Draft->Name, FALSE), $EditUrl, 'Title DraftLink'); ?>
         <div class="Excerpt"><?php
            echo Anchor(SliceString(Gdn_Format::Text($Draft->Body), 200), $EditUrl);
         ?></div>
      </div>
   </li>
   <?php
}
