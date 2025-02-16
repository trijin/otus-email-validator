<?php
require dirname(__DIR__).'/vendor/autoload.php';
use Trijin\OtusEmailValidator\Validator;
use PHPUnit\Framework\TestCase;
class EmailValidatorTest extends TestCase
{
    public function testValidEmail()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('test@example.com'));
    }

    public function testInvalidEmail()
    {
        $validator = new Validator();
        $this->assertFalse($validator->isValid('invalid-email'));
        $this->assertFalse($validator->isValid('faust@gret@gmail.com'));

    }
}