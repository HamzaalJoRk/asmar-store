<?php

namespace App\Traits;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Builder;

trait EmployeeTrait
{
    public static function bootEmployeeTrait()
    {
        if (auth()->check()) {

            // static::creating(function ($model) {
            //     $model->user_id = auth()->user()->id;
            //     // $model->last_update = auth()->user()->id;
            // });

            // static::updating(function ($model) {
            //     $model->last_update = auth()->user()->id;
            // });
            static::updating(function ($model) {
                $model->canceled_by = auth()->user()->id;
                $model->canceled_type = 'Admin';
            });

            /* static::addGlobalScope('employee_id', function (Builder $builder) {
                return $builder->where('employee_id', auth()->user()->id);
            }); */
        }
    }
}
