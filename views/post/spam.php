<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

   echo $this->Form->Open();
   echo $this->Form->Errors();
   echo $this->Form->Close();
?>
<div class="Info">
<?php
if ($this->RequestMethod == 'discussion')
	$Message = T('DiscussionRequiresApproval', "Your discussion will appear after it is approved.");
else
	$Message = T('CommentRequiresApproval', "Your comment will appear after it is approved.");
echo '<div>', $Message, '</div>';

if ($this->Data('DiscussionUrl'))
   echo '<div>', sprintf(T('Click <a href="%s">here</a> to go back to the discussion.'), Url($this->Data('DiscussionUrl'))), '</div>';
else
   echo '<div>', Anchor('Back to the discussions list.', 'discussions'), '</div>';
?>
</div>
