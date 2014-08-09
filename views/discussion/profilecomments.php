<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

foreach ($this->Data('Comments') as $Comment) {
	$Permalink = '/discussion/comment/'.$Comment->CommentID.'/#Comment_'.$Comment->CommentID;
	$User = UserBuilder($Comment, 'Insert');
	$this->EventArguments['User'] = $User;
?>
<li id="<?php echo 'Comment_'.$Comment->CommentID; ?>" class="Item">
	<?php $this->FireEvent('BeforeItemContent'); ?>
	<div class="ItemContent">
		<div class="Message"><?php
			echo SliceString(Gdn_Format::Text(Gdn_Format::To($Comment->Body, $Comment->Format), FALSE), 250);
		?></div>
		<div class="Meta">
         <span class="MItem"><?php echo T('Comment in', 'in').' '; ?><b><?php echo Anchor(Gdn_Format::Text($Comment->DiscussionName), $Permalink); ?></b></span>
			<span class="MItem"><?php printf(T('Comment by %s'), UserAnchor($User)); ?></span>
			<span class="MItem"><?php echo Anchor(Gdn_Format::Date($Comment->DateInserted), $Permalink); ?></span>
		</div>
	</div>
</li>
<?php
}
