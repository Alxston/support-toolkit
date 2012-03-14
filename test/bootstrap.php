<?php
/**
*
* @package testing
* @copyright (c) 2008 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

// Define some initial constants
define('STK_ROOT', __DIR__ . '/../stk/');
define('PHPBB_FILES', STK_ROOT . 'phpBB/');
define('IN_TEST', true);

// Some to make phpBB files accessable in the first place
$phpbb_root_path = STK_ROOT . '../';
$phpEx = 'php';
define('IN_PHPBB', true);

// Map the db constants to the phpBB vars
if (!defined('dbms'))
{
	define('dbms', 'sqlite');
	define('dbhost', __DIR__ . '/unit_tests.sqlite2'); // filename
	define('dbuser', '');
	define('dbpasswd', '');
	define('dbname', '');
	define('dbport', '');
	define('table_prefix', '');
}
$dbms = dbms;

$phpbb_tests_path = STK_ROOT . 'vendor/phpBB/tests/';
$phpEx = 'php';

$table_prefix = (!defined('table_prefix')) ? 'phpbb_' : table_prefix;

require_once $phpbb_tests_path . 'test_framework/phpbb_test_case_helpers.php';
require_once $phpbb_tests_path . 'test_framework/phpbb_test_case.php';
require_once $phpbb_tests_path . 'test_framework/phpbb_database_test_case.php';
require_once $phpbb_tests_path . 'test_framework/phpbb_database_test_connection_manager.php';

require_once __DIR__ . '/test_framework/stk_database_test_case.php';
require_once __DIR__ . '/test_framework/stk_database_test_connection_manager.php';
require_once __DIR__ . '/test_framework/stk_test_case.php';

require_once PHPBB_FILES . 'includes/class_loader.' . $phpEx;
$stk_class_loader = new phpbb_class_loader('stk_', STK_ROOT);
$stk_class_loader->register();
$phpbb_class_loader = new phpbb_class_loader('phpbb_', PHPBB_FILES . 'includes/');
$phpbb_class_loader->register();
