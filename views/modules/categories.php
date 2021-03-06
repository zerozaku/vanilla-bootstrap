<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

$CountDiscussions = 0;
$CategoryID = isset($this->_Sender->CategoryID) ? $this->_Sender->CategoryID : '';
$OnCategories = strtolower($this->_Sender->ControllerName) == 'categoriescontroller' && !is_numeric($CategoryID);
if ($this->Data !== FALSE) {
   foreach ($this->Data->Result() as $Category) {
      $CountDiscussions = $CountDiscussions + $Category->CountDiscussions;
   }
   ?>
<div class="Box BoxCategories">
   <h4><?php echo T('Categories'); ?></h4>
   <ul class="PanelInfo PanelCategories">
   <?php
   echo '<li'.($OnCategories ? ' class="Active"' : '').'>'.
      Anchor(T('All Categories')
      .' <span class="Aside"><span class="Count">'.BigPlural($CountDiscussions, '%s discussion').'</span></span>', '/categories', 'ItemLink')
      .'</li>';

   $MaxDepth = C('Vanilla.Categories.MaxDisplayDepth');
   $DoHeadings = C('Vanilla.Categories.DoHeadings');
   
   foreach ($this->Data->Result() as $Category) {
      if ($Category->CategoryID < 0 || $MaxDepth > 0 && $Category->Depth > $MaxDepth)
         continue;

      if ($DoHeadings && $Category->Depth == 1)
         $CssClass = 'Heading '.$Category->CssClass;
      else
         $CssClass = 'Depth'.$Category->Depth.($CategoryID == $Category->CategoryID ? ' Active' : '').' '.$Category->CssClass;
      
      echo '<li class="ClearFix '.$CssClass.'">';

      if ($DoHeadings && $Category->Depth == 1) {
         echo htmlspecialchars($Category->Name)
            .' <span class="Aside"><span class="Count Hidden">'.BigPlural($Category->CountAllDiscussions, '%s discussion').'</span></span>';
      } else {
         $CountText = ' <span class="Aside"><span class="Count">'.BigPlural($Category->CountAllDiscussions, '%s discussion').'</span></span>';
         
         echo Anchor(htmlspecialchars($Category->Name).$CountText, CategoryUrl($Category), 'ItemLink');
      }
      echo "</li>\n";
   }
?>
   </ul>
</div>
   <?php
}
