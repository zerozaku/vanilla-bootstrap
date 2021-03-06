<?php if (!defined('APPLICATION')) exit();
$User = val('User', Gdn::controller());
if (!$User && Gdn::session()->isValid()) {
    $User = Gdn::session()->User;
}

if (!$User)
    return;

$Photo = $User->Photo;

if ($Photo) {
    ?>
    <div class="Photo PhotoWrap PhotoWrapLarge <?php echo val('_CssClass', $User); ?>">
        <?php
        if (IsUrl($Photo))
            $Img = img($Photo, array('class' => 'ProfilePhotoLarge'));
        else
            $Img = img(Gdn_Upload::url(changeBasename($Photo, 'p%s')), array('class' => 'ProfilePhotoLarge'));
        
        echo $Img;
        ?>
    </div>
    <div class="ProfileUsername">
        <?php
        echo htmlspecialchars($User->Name);
        echo '<span class="Gloss">';
        Gdn_Theme::BulletRow();
        if ($this->User->Title) {
            echo Gdn_Theme::BulletItem('Title');
            echo ' '.Bullet().' '.Wrap(htmlspecialchars($this->User->Title), 'span', array('class' => 'User-Title'));
        }
        $this->fireEvent('UsernameMeta');
        echo '</span>';
        ?>
    </div>
    <div class="ProfileButtons">
        <?php
        if (!$User->Banned && c('Garden.Profile.EditPhotos', true) && (Gdn::session()->UserID == $User->UserID || Gdn::session()->checkPermission('Garden.Users.Edit'))) {
        ?>
        <div class="ChangePic">
            <?php
                echo anchor(Wrap(t('Change Picture')), '/profile/picture?userid='.$User->UserID, 'ChangePicture');
            ?>
        </div>
        <?php 
        }
        ?>
        <div class="ProfileOpts">
            <?php
            $Controller = Gdn::controller();
            $Controller->fireEvent('BeforeProfileOptions');
            echo ButtonGroup($Controller->EventArguments['MemberOptions'], 'NavButton MemberButtons');
            echo ' ';
            echo ButtonDropDown($Controller->EventArguments['ProfileOptions'],
                'NavButton ProfileButtons Button-EditProfile',
                sprite('SpEditProfile', 'Sprite16').' <span class="Hidden">'.t('Edit Profile').'</span>'
            );
            ?>
        </div>
    </div>
<?php } else if ($User->UserID == Gdn::session()->UserID || Gdn::session()->checkPermission('Garden.Users.Edit')) { ?>
    <div
        class="Photo"><?php echo anchor(t('Add a Profile Picture'), '/profile/picture?userid='.$User->UserID, 'AddPicture BigButton'); ?></div>
<?php
}