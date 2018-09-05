<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScopePerson implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        // TODO: Implement apply() method.
        $builder->where('age', '>', 20);
    }
}
