<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/

$Session = Gdn::Session();
$this->FireEvent('BeforeCommentsRender');
if (!function_exists('WriteComment'))
   include($this->FetchViewLocation('helper_functions', 'discussion'));

$CurrentOffset = $this->Offset;

$this->EventArguments['CurrentOffset'] = &$CurrentOffset;
$this->FireEvent('BeforeFirstComment');

// Only prints individual comment list items
$Comments = $this->Data('Comments')->Result();
foreach ($Comments as $Comment) {
   if (is_numeric($Comment->CommentID))
      $CurrentOffset++;
   $this->CurrentComment = $Comment;
   WriteComment($Comment, $this, $Session, $CurrentOffset);
}
