<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/

$Session = Gdn::Session();
?>
<div class="MessageForm EditCommentForm FormTitleWrapper">
   <div class="Form-BodyWrap">
      <div class="Form-Body">
         <div class="FormWrapper FormWrapper-Condensed">
            <?php
            echo $this->Form->Open();
            echo $this->Form->Errors();
            echo $this->Form->BodyBox('Body', array('Table' => 'Comment', 'tabindex' => 1));
            echo "<div class=\"Buttons\">\n";
            echo Wrap(Anchor(T('Cancel'), '/'), 'span class="Cancel"');
            echo $this->Form->Button('Save Comment', array('class' => 'Button Primary CommentButton', 'tabindex' => 2));
            echo "</div>\n";
            echo $this->Form->Close();
            ?>
         </div>
      </div>
   </div>
</div>
