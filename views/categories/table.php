<?php if (!defined('APPLICATION')) return;

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/

?>
<h1 class="H HomepageTitle"><?php echo $this->Data('Title'); ?></h1>
<div class="P PageDescription"><?php echo $this->Description(); ?></div>
<?php
$Categories = CategoryModel::MakeTree($this->Data('Categories'), $this->Data('Category', NULL));

if (C('Vanilla.Categories.DoHeadings')) {
   foreach ($Categories as $Category) {
      ?>
      <div id="CategoryGroup-<?php echo $Category['UrlCode']; ?>" class="CategoryGroup">
         <h2 class="H"><?php echo htmlspecialchars($Category['Name']); ?></h2>
         <?php
         WriteCategoryTable($Category['Children'], 2);
         ?>
      </div>
      <?php
   }
} else {
   WriteCategoryTable($Categories, 1);
}
?>
