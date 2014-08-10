<?php

$ThemeInfo['bootstrap'] = array(
  'Name'        => 'Bootstrap',
  'Description' => "Bootstrap for Vanilla has been rewritten from scratch on top of <a href='http://getbootstrap.com'>Bootstrap 3</a> in this second installation of the most popular theme for Vanilla Forums. Kickstart your community with a fresh and solid theme that is ready to be customized to your heart's desires.",
  'Version'     => '2.3.1',
  'Url'         => 'https://github.com/kasperisager/vanilla-bootstrap',
  'Author'      => 'Kasper Kronborg Isager',
  'AuthorEmail' => 'kasperisager@gmail.com',
  'AuthorUrl'   => 'https://github.com/kasperisager',
  'License'     => 'MIT',
  'RequiredApplications' => array('Vanilla' => '2.1.x'),

  'Options' => array(
    'Styles' => array(
      'Default'   => '%s_default',
      'Zerozaku'  => '%s_zerozaku'
      'Bootstrap' => '%s_bootstrap',
      'Cosmo'     => '%s_cosmo',
      'Darkly'    => '%s_darkly',
    )
  )
);
