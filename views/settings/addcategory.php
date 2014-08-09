<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

echo $this->Form->Open();
echo $this->Form->Errors();
?>
<h1><?php echo T('Add Category'); ?></h1>
<ul>
   <li>
      <div class="Info"><?php
         echo Wrap(T('Categories are used to organize discussions.', '<strong>Categories</strong> allow you to organize your discussions.'), 'div');
      ?></div>
   </li>
   <li>
      <?php
         echo $this->Form->Label('Category', 'Name');
         echo $this->Form->TextBox('Name');
      ?>
   </li>
   <li id="UrlCode">
		<?php
		echo Wrap(T('Category Url:'), 'strong');
		echo ' ';
		echo Gdn::Request()->Url('category', TRUE);
		echo '/';
		echo Wrap(htmlspecialchars($this->Form->GetValue('UrlCode')));
		echo $this->Form->TextBox('UrlCode');
		echo '/';
		echo Anchor(T('edit'), '#', 'Edit');
		echo Anchor(T('OK'), '#', 'Save SmallButton');
		?>
   </li>
   <li>
      <?php
         echo $this->Form->Label('Description', 'Description');
         echo $this->Form->TextBox('Description', array('MultiLine' => TRUE));
      ?>
   </li>
   <li>
      <?php
         echo $this->Form->Label('Css Class', 'CssClass');
         echo $this->Form->TextBox('CssClass', array('MultiLine' => FALSE));
      ?>
   </li>
   <li>
      <?php
         echo $this->Form->Label('Display As', 'DisplayAs');
         echo $this->Form->DropDown('DisplayAs', array('Default' => 'Default', 'Categories' => 'Categories', 'Discussions' => 'Discussions'));
      ?>
   </li>
   <li>
      <?php
      echo $this->Form->CheckBox('HideAllDiscussions', 'Hide from the recent discussions page.');
      ?>
   </li>
   <?php
   echo $this->Form->Simple(
      $this->Data('_ExtendedFields', array()),
      array('Wrap' => array('', '')));
   ?>
	<?php if(count($this->PermissionData) > 0) { ?>
   <li id="Permissions">
      <?php
         echo $this->Form->CheckBox('CustomPermissions', 'This category has custom permissions.');

         echo '<div class="CategoryPermissions">';
         echo T('Check all permissions that apply for each role');
         echo $this->Form->CheckBoxGridGroups($this->PermissionData, 'Permission');
         echo '</div>';
      ?>
   </li>
	<?php } ?>
</ul>
<?php echo $this->Form->Close('Save'); ?>
