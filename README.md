## QuikMovie BACK

An application used to search movies form consumi a API The Movie DB, built with Laravel.

## Requirements

- PHP >= 7.4.3
- Mbstring
- Node.Js
- Composer
- OpenSSL

## Install
```
    $ git clone https://github.com/PedroKruszynski/quikMovie-back.git
    $ cd quikMovie-back
```

## Available Scripts

In the project directory, run:

### To install the modules
```
    $ composer install
```

### Copy the env configuration
```
    $ cp .env-example .env
    $ composer key
```

##### Directory Permissions, public and the bootstrap/cache directories should be writable by your web server or Laravel will not run

### For Start Server
```
    $ composer serve
```

### For tests
```
    $ composer test
```

