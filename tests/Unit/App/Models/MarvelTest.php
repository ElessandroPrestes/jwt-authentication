<?php

namespace Tests\Unit\App\Models;

use App\Models\Marvel;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;

class MarvelTest extends BaseModelTestCase
{
    protected function model(): Model
    {
        return new Marvel();
    }

    protected function fillable(): array
    {
        return [
            'gender',
            'president',
            'localization',
        ];
    }
}
