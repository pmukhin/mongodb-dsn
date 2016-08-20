# mongodb-dsn

[![Build Status](https://travis-ci.org/redneck1/mongodb-dsn.svg?branch=master)](https://travis-ci.org/redneck1/mongodb-dsn)
[![Code Climate](https://codeclimate.com/github/redneck1/mongodb-dsn/badges/gpa.svg)](https://codeclimate.com/github/redneck1/mongodb-dsn)
[![Test Coverage](https://codeclimate.com/github/redneck1/mongodb-dsn/badges/coverage.svg)](https://codeclimate.com/github/redneck1/mongodb-dsn/coverage)

## Approach
Providing easy to configure dsn strings for MongoDB

## Usage
```
use Redneck1\MongoDB\Dsn;
use MongoDB\Client;

// "mongodb://myUsername:myPassword@127.0.0.1:27017/TestDb"
$dsn = new Dsn(
    $config->get('mongodb.host'),
    $config->get('mongodb.database'),
    $config->get('mongodb.username'),
    $config->get('mongodb.password')
);

$mongodb = (new Client((string)$dsn))
    ->selectDatabase($config->get('mongodb.database'));
    
$dsn = new Dsn(
    '127.0.0.1',
    null,
    null,
    null,
    '2456'
);

// "mongodb://127.0.0.1:2456"
echo (string)$dsn;
```