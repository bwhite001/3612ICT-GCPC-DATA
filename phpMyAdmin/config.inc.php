<?php
// use here a value of your choice (maximum 46 characters):
$cfg['blowfish_secret'] = 'fx82aulin42A';    

$i = 0;
$i++;

// 'cookie' or 'http'
$cfg['Servers'][$i]['auth_type']   = 'cookie';

// or any existing user, change later to "pma" 
$cfg['Servers'][$i]['controluser'] = 'root';

// with proper password
$cfg['Servers'][$i]['controlpass'] = 'kognak001';

// PHP 5 support for new MySQL 4.1.3+ features:
$cfg['Servers'][$i]['extension'] = 'mysqli';

// if you insist on "root" having no password, pma3 needs: 
$cfg['Servers'][$i]['AllowNoPasswordRoot'] = true; 
?>
