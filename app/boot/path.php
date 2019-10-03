<?php

////////////////////////////////////////////////////////////////////////////////
/// Head: Env
	if (!defined('THE_APP_ENV')) {
		#define('THE_APP_ENV', 'prod');
		define('THE_APP_ENV', 'dev');
	}

	if (!defined('THE_APP_ROOT')) {
		define('THE_APP_ROOT', dirname(dirname(dirname(__FILE__))));
	}

	if (!defined('THE_BIN_LOCATE')) {
		define('THE_BIN_LOCATE', THE_APP_ROOT . '/bin');
	}
/// Tail: Env
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
/// Head: Cli

	define('THE_CLI_PLAN_DIR_PATH', dirname(dirname(dirname(__FILE__))));


	// top level dir
	// (bin)
	define('THE_CLI_BIN_DIR_NAME', 'bin');
	define('THE_CLI_BIN_DIR_PATH', THE_CLI_PLAN_DIR_PATH . '/' . THE_CLI_BIN_DIR_NAME);

	// (lib)
	define('THE_CLI_LIB_DIR_NAME', 'lib');
	define('THE_CLI_LIB_DIR_PATH', THE_CLI_PLAN_DIR_PATH . '/' . THE_CLI_LIB_DIR_NAME);

	// (app)
	define('THE_CLI_APP_DIR_NAME', 'app');
	define('THE_CLI_APP_DIR_PATH', THE_CLI_PLAN_DIR_PATH . '/' . THE_CLI_APP_DIR_NAME);

	// (src)
	define('THE_CLI_SRC_DIR_NAME', 'src');
	define('THE_CLI_SRC_DIR_PATH', THE_CLI_PLAN_DIR_PATH . '/' . THE_CLI_SRC_DIR_NAME);

	// (var)
	define('THE_CLI_VAR_DIR_NAME', 'var');
	define('THE_CLI_VAR_DIR_PATH', THE_CLI_PLAN_DIR_PATH . '/' . THE_CLI_VAR_DIR_NAME);


	// (lib/vendor)
	define('THE_CLI_VENDOR_DIR_NAME', 'vendor');
	define('THE_CLI_VENDOR_DIR_PATH', THE_CLI_LIB_DIR_PATH . '/' . THE_CLI_VENDOR_DIR_NAME); // (lib/vendor)

	define('THE_CLI_VENDOR_AUTOLOAD_FILE_NAME', 'autoload.php');
	define('THE_CLI_VENDOR_AUTOLOAD_FILE_PATH', THE_CLI_VENDOR_DIR_PATH . '/' . THE_CLI_VENDOR_AUTOLOAD_FILE_NAME); // (lib/vendor/autoload.php)


	// (app)
	// (app/boot)
	define('THE_CLI_APP_BOOT_DIR_NAME', 'boot');
	define('THE_CLI_APP_BOOT_DIR_PATH', THE_CLI_APP_DIR_PATH . '/' . THE_CLI_APP_BOOT_DIR_NAME); // (app/boot)

	define('THE_CLI_APP_BOOT_FILE_NAME', 'start.php');
	define('THE_CLI_APP_BOOT_FILE_PATH', THE_CLI_APP_BOOT_DIR_PATH . '/' . THE_CLI_APP_BOOT_FILE_NAME); // (app/boot/start.php)


/// Tail: Cli
////////////////////////////////////////////////////////////////////////////////
