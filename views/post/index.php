<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/


$Forms = $this->Data('Forms');
// Loop through the form collection and write out the handles
$FormToggleMenu = new ToggleMenuModule();
foreach ($Forms as $Form) {
	$Code = GetValue('Name', $Form);
   $Active = strtolower($Code) == strtolower($this->Data('CurrentFormName'));
   if ($Active)
      $FormToggleMenu->CurrentLabelCode($Code);
   
   $FormToggleMenu->AddLabel(GetValue('Label', $Form), $Code);
}
echo $FormToggleMenu->ToString();

// Now loop through the form collection and dump the forms
foreach ($Forms as $Form) {
	$Name = GetValue('Name', $Form);
	$Active = strtolower($Name) == strtolower($this->Data('CurrentFormName'));
	$Url = GetValue('Url', $Form);
	echo '<div class="Toggle-'.$Name.($Active ? ' Active' : '').' FormWrap">';
		// echo ProxyRequest(Url($Url.'?DeliveryType=VIEW', TRUE));
		echo '<div class="Popin" rel="'.Url($Url.'?DeliveryType=VIEW', TRUE).'"></div>';
	echo '</div>';
}
