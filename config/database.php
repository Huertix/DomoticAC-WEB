'default' => 'pgsql',


'pgsql' => [
    'driver'   => 'pgsql',
    'host'     => parse_url(getenv("DATABASE_URL"))["host"],
    'database' => substr(parse_url(getenv("DATABASE_URL"))["path"], 1),
    'username' => parse_url(getenv("DATABASE_URL"))["user"],
    'password' => parse_url(getenv("DATABASE_URL"))["pass"],
    'charset'  => 'utf8',
    'prefix'   => '',
    'schema'   => 'public',
],