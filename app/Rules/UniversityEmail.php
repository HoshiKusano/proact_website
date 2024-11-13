<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniversityEmail implements ValidationRule
{
    /**
     * 許可する大学のドメインリスト
     */
    protected $allowedDomains = [
        'ms.nagasaki-u.ac.jp',  // ここに実際の大学のドメインを設定
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $domain = substr(strrchr($value, "@"), 1);
        
        if (!in_array($domain, $this->allowedDomains)) {
            $fail('指定された大学のメールアドレスのみ使用できます。');
        }
    }
}
