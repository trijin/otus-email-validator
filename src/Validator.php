<?php

namespace Trijin\OtusEmailValidator;

use SensitiveParameter;

class Validator
{
    public final function isValid(#[SensitiveParameter] string $email): bool
    {
        // Проверяем синтаксис email-адреса
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Извлекаем домен из email-адреса
        $domain = idn_to_ascii(substr(strrchr($email, "@"), 1));

        // Проверяем наличие MX-записи для домена
        if (!checkdnsrr($domain)) {
            return false;
        }
        return true;
    }
}
