<?php

namespace App\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
use Riipandi\LaravelOptiKey\Traits\HasUlidKey;
use Riipandi\LaravelOptiKey\Traits\UlidAsPrimaryKey;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use HasUlidKey, UlidAsPrimaryKey;

    // Model table name.
    protected $table = 'personal_access_tokens';

    protected $ulidLowerCase = true;

    // Laravel OptiKey field name.
    protected $optiKeyFieldName = 'id';

}
