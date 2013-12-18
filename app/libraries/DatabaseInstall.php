<?php

class DatabaseInstall {
	
	public static function install()
    {

    	$driver = Config::get('database.default');
        $prefix = 'database.connections.' . $driver . '.';
        $data = new stdClass();
        $data->host = Config::get($prefix . 'host');
        $data->user = Config::get($prefix . 'username');
        $data->pass = Config::get($prefix . 'password');
        $data->schema = Config::get($prefix . 'database');
        $data->port = Config::get($prefix . 'port');
        $data->driver = $driver;
        $data->port = ';port=' . $data->port;
        
        print 'Configuration initialized.<br />';

        try {
        	$con = $data->driver . ':host=' . $data->host . $data->port;

            $pdo = new PDO($con, $data->user, $data->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            print 'Trying to connect.<br />';
            if($pdo)
            {
            	print 'Connected.<br />';
        		$pdo->query('CREATE DATABASE `' . $data->schema . '`');
        		print 'Database: ' . $data->schema . ' was created.<br />';

        		Schema::create('blog', function($t) {
					$t->increments('id');
					$t->string('title', 200);
					$t->string('slug', 255);
					$t->text('content');
					$t->timestamps();
				});
				print 'Table: blog has been created.<br />';

        		Schema::create('user', function($t) {
					$t->increments('id');
					$t->string('username', 36);
					$t->string('password', 128);
				});
        		print 'Table: user has been created.<br />';

        		$pdo = null;

        		print 'Installed.<br />';
        		print '<span style="color:red;font-weight:bold;">Remove route \'install\' from app\routes.php!!</span>';

        		return ' ';

            }

        }
        catch(PDOException $e)
        {
        	echo 'ERROR: ' . $e->getMessage();
        }

        return 'No!';

    }

}