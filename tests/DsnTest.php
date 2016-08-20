<?php

namespace Redneck1\MongoDB\Tests;

use Redneck1\MongoDB\Dsn;

/**
 * Class DsnTest
 *
 * @covers Redneck1\MongoDB\Dsn
 */
class DsnTest extends \PHPUnit_Framework_TestCase
{
    /** @covers Redneck1\MongoDB\Dsn::__toString */
    public function testEmpty()
    {
        $dsn = new Dsn();
        static::assertEquals('mongodb://127.0.0.1:27017', (string)$dsn);
    }

    /** @covers Redneck1\MongoDB\Dsn::__toString */
    public function testNoCredentials()
    {
        $dsn = new Dsn(
            '127.0.0.1',
            'TestDb'
        );

        static::assertEquals('mongodb://127.0.0.1:27017/TestDb', (string)$dsn);
    }

    /** @covers Redneck1\MongoDB\Dsn::__toString */
    public function testWithCredentials()
    {
        $dsn = new Dsn(
            '127.0.0.1',
            'TestDb',
            'myUsername',
            'myPassword'
        );

        static::assertEquals('mongodb://myUsername:myPassword@127.0.0.1:27017/TestDb', (string)$dsn);
    }

    /** @covers Redneck1\MongoDB\Dsn::__toString */
    public function testWithCustomPort()
    {
        $dsn = new Dsn(
            '127.0.0.1',
            null,
            null,
            null,
            '2456'
        );

        static::assertEquals('mongodb://127.0.0.1:2456', (string)$dsn);
    }

    /** @covers Redneck1\MongoDB\Dsn::__toString */
    public function testWithNoPassword()
    {
        $dsn = new Dsn(
            '127.0.0.1',
            null,
            'username',
            null
        );

        static::assertEquals('mongodb://username@127.0.0.1:27017', (string)$dsn);
    }
}