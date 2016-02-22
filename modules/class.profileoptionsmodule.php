<?php
/**
 * Change asset target from Content to Panel
 */
class ProfileOptionsModule extends Gdn_Module {
    public function assetTarget() {
        return 'Panel';
    }
}