<?php

	shell_exec('php artisan migrate:install');
	shell_exec('php artisan migrate');
	shell_exec('php artisan db:seed');

?>