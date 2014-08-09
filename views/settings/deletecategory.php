<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

echo $this->Form->Open();
echo $this->Form->Errors();
if (is_object($this->OtherCategories)) {
   ?>
   <h1><?php echo T('Delete Category'); ?></h1>
   <ul>
   <?php
   if ($this->OtherCategories->NumRows() == 0) {
      ?>
      <li><p class="Warning"><?php echo T('Are you sure you want to delete this category?'); ?></p></li>
      <?php
   } else {
      // Only show the delete discussions checkbox if we're deleting a non-parent category.
      if ($this->Category->AllowDiscussions == '1') {
   ?>
      <li>
         <?php
            echo $this->Form->CheckBox('DeleteDiscussions', "Move discussions in this category to a replacement category.", array('value' => '1'));
         ?>
      </li>
   <?php }
   if ($this->Category->AllowDiscussions == '1') {
      ?>
      <li id="ReplacementWarning"><p class="Warning"><?php echo T('<strong>Heads Up!</strong> Moving discussions into a replacement category can result in discussions vanishing (or appearing) if the replacement category has different permissions than the category being deleted.'); ?></p></li>
      <?php
   }
   ?>
      <li id="ReplacementCategory">
         <?php
            echo $this->Form->Label('Replacement Category', 'ReplacementCategoryID');
            echo $this->Form->DropDown(
               'ReplacementCategoryID',
               $this->OtherCategories,
               array(
                  'ValueField' => 'CategoryID',
                  'TextField' => 'Name',
                  'IncludeNull' => TRUE
               ));
         ?>
      </li>
      <li id="DeleteDiscussions">
         <p class="Warning"><?php echo T('All discussions in this category will be permanently deleted.'); ?></p>
      </li>
   </ul>
   <?php
   }
   echo $this->Form->Close('Proceed');
}
