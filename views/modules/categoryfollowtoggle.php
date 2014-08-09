<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

$ShowAllCategoriesPref = Gdn::Session()->GetPreference('ShowAllCategories');
$Url = Gdn::Request()->Path();
?>

<div class="CategoryFilter">
   <div class="CategoryFilterTitle"><?php echo T('Category Filter'); ?></div>
   <div class="CategoryFilterOptions">
      <?php echo Wrap(T('Viewing'), 'span').': '; ?>
      <?php 
      if ($ShowAllCategoriesPref):
         echo Wrap(T('all categories'), 'span', array('class' => 'CurrentFilter'));
         echo ' | ';
         echo Wrap(Anchor(T('followed categories'), $Url.'?ShowAllCategories=false'), 'span');
      else:
         echo Wrap(Anchor(T('all categories'), $Url.'?ShowAllCategories=true'), 'span');
         echo ' | ';
         echo Wrap(T('followed categories'), 'span', array('class' => 'CurrentFilter'));
      endif;
      ?>
   </div>
</div>
