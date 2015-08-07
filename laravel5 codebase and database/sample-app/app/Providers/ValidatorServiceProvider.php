<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    public function boot()
    {
        Validator::extend('unique_multiple', function ($attribute, $value, $parameters){
            $table_name = array_shift($parameters);

            // Build the query
            $query = DB::table($table_name);

            // Add the field conditions
            foreach ($parameters as $i => $field){
                $query->where($field, $value[$i]);
            }
                

            // Validation result will be false if any rows match the combination
            return ($query->count() == 0);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}