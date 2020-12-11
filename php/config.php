<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

/* Add all config for database connection */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123');
define('DB_NAME', 'gservers');
define('DB_CHARSET', 'utf8');

/* Design System */
define('COLOR_PRIMARY', '#05668D');
define('COLOR_SECONDARY', '#00A896');
define('COLOR_ACCENT_LIGHT', '#02C39A');
define('COLOR_INACTIVE', '#F18F01');
define('COLOR_ACCENT', '#FFBE0B');
define('COLOR_INPUT', '#F0F3BD');
define('COLOR_LIGHT', '#F2F2F2');
define('COLOR_WHITE', '#FFFFFF');

/* Routes */
define('ROUTE_INDEX', '');
define('ROUTE_ADMIN', '/admin');
define('ROUTE_ADMIN_LOGIN', '/admin/login_admin.php');
define('ROUTE_FEATURES', '/features');
define('ROUTE_PRICING', '/pricing');
define('ROUTE_DOCS', '/docs');
define('ROUTE_REGISTER', '/signup');
define('ROUTE_LOGIN', '/login');
define('ROUTE_PROFILE', '/profile');
define('ROUTE_PROJECT', '/project');
define('ROUTE_NEW_PROJECT', '/project/register.php');
define('ROUTE_PROJECT_ECONOMY', '/project/economy.php');
define('ROUTE_PROJECT_EXPERIMENTS', '/project/experiments.php');
