<?php declare(strict_types=1);

use Nabeghe\Matcher\Matcher;

class MatcherCase extends \PHPUnit\Framework\TestCase
{
    public const DATA = [
        'key1' => 'value 1',
        'key2' => 'value 2',
        'key3' => 'value 3',
        'key4' => 'value 4',
        'key5' => 'value 5',
    ];

    public function testValue(): void
    {
        $matched_value = Matcher::value(self::DATA, 'key5');
        $this->assertSame('value 5', $matched_value);
    }

    public function testValueDefault(): void
    {
        $matched_value = Matcher::value(self::DATA, 'key', 'value not found');
        $this->assertSame('value not found', $matched_value);
    }

    public function testValueCallable(): void
    {
        $data = [
            'key1' => 'value 1',
            'key2' => 'value 2',
            'key3' => 'value 3',
            'key4' => 'value 4',
            'key5' => function () {
                return 'value 5';
            },
        ];
        $matched_value = Matcher::value($data, 'key1', null, true);
        $this->assertSame('value 1', $matched_value);
        $matched_value = Matcher::value($data, 'key5', null, true);
        $this->assertSame('value 5', $matched_value);
    }

    public function testKey(): void
    {
        $matched_key = Matcher::key(self::DATA, 'value 5');
        $this->assertSame('key5', $matched_key);
    }

    public function testKeyDefault(): void
    {
        $matched_key = Matcher::key(self::DATA, 'value', 'key nto found');
        $this->assertSame('key nto found', $matched_key);
    }

    public function testValues(): void
    {
        $matched_values = Matcher::values(self::DATA, ['key1', 'key5']);
        $this->assertSame(['value 1', 'value 5'], $matched_values);
    }

    public function testValuesCallable(): void
    {
        $data = [
            'key1' => 'value 1',
            'key2' => 'value 2',
            'key3' => 'value 3',
            'key4' => 'value 4',
            'key5' => function () {
                return 'value 5';
            },
        ];
        $matched_values = Matcher::values($data, ['key1', 'key5'], null, true);
        $this->assertSame(['value 1', 'value 5'], $matched_values);
    }
}