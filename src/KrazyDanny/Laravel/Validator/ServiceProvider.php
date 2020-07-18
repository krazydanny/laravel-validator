<?php

namespace KrazyDanny\Laravel\Validator;

use Validator;
use Illuminate\Support\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

        Validator::extend( 'document_number', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^[0-9a-zA-Z]+(( |\/|-|.)?[0-9a-zA-Z])+$/', 
                $value
            );
        } );


        Validator::extend( 'float', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            switch ( $parameters[0] ?? null ) {

                case 'strict':
                    return is_float($value);
                default:
                    return preg_match(
                        '/^[0-9]+((.)[0-9]{1,2})?$/', 
                        $value
                    );  
            }
        } );


        Validator::extend( 'number', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return is_float($value) || is_integer($value);
        } );


        Validator::extend( 'color_hex', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            if ( \is_array($value) ) {

                foreach ( $value as $v ) {

                    if ( 
                        !preg_match(
                            '/^(\#){1}[A-Za-z0-9]{6}$/', 
                            $value
                        )
                    ){
                        return false;
                    }
                }
            }
            else {

                return preg_match(
                    '/^(\#){1}[A-Z0-9]{6}$/', 
                    $value
                );                
            }

            return true;
        } );        


        Validator::extend( 'latitude', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            if ( 
                is_float($value) 
                && preg_match(
                    '/^-?[1-9]{1}([0-9]{1})?(.)[0-9]{1,14}$/', 
                    $value
                )
                && $value < 90
                && $value > -90
            ){
                return true;
            }

            return false;
        } );


        Validator::extend( 'longitude', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            if ( 
                is_float($value) 
                && preg_match(
                    '/^-?[1-9]{1}([0-9]{1,2})?(.)[0-9]{1,14}$/',
                    $value
                )
                && $value < 180
                && $value > -180
            ){
                return true;
            }

            return false;
        } );


        Validator::extend( 'person_name', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^([a-zA-Z]{1,}(( ){1}[a-zA-Z]{1,})?)$/',
                $value
            );
        } );


        Validator::extend( 'phone_number', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^(\+)?[0-9]+$/', 
                $value
            );
        } );


        Validator::extend( 'owasp_password', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9])(([^\n \t\v\R])(?!\2)){12,255}$/', 
                $value
            );
        } );


        Validator::extend( 'mac_address', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^([0-9A-F]{2}[:-]){5}([0-9A-F]{2})$/',
                $value
            );
        } ); 


        Validator::extend( 'date_lt_min', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        )
        {
            if ( !$parameters[0] )
                return true;

            if ( $parameters[2] ?? false ) {

                $dateTime = DateTime::createFromFormat (
                    $parameters[2],
                    $value
                );

                $value = (string)$dateTime->format(
                    'Y-m-d H:i:s'
                );
            }

            $d1 = strtotime( $value ); 
            $d2 = strtotime( $parameters[0] );

            return $d2-$d1 >= $parameters[1];
        } );


        Validator::extend( 'date_gt_min', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        )
        {
            if ( !$parameters[0] )
                return true;

            if ( $parameters[2] ?? false ) {

                $dateTime = DateTime::createFromFormat (
                    $parameters[2],
                    $value
                );

                $value = (string)$dateTime->format(
                    'Y-m-d H:i:s'
                );
            }            
                            
            $d1 = strtotime( $value ); 
            $d2 = strtotime( $parameters[0] );

            return $d1-$d2 >= $parameters[1];
        } );        


        Validator::extend( 'date_lt_max', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        )
        {
            if ( !$parameters[0] )
                return true;

            if ( $parameters[2] ?? false ) {

                $dateTime = DateTime::createFromFormat (
                    $parameters[2],
                    $value
                );

                $value = (string)$dateTime->format(
                    'Y-m-d H:i:s'
                );
            }

            $d1 = strtotime( $value ); 
            $d2 = strtotime( $parameters[0] ); 

            return $d2-$d1 <= $parameters[1];
        } );


        Validator::extend( 'date_gt_max', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        )
        {
            if ( !$parameters[0] )
                return true;

            if ( $parameters[2] ?? false ) {

                $dateTime = DateTime::createFromFormat (
                    $parameters[2],
                    $value
                );

                $value = (string)$dateTime->format(
                    'Y-m-d H:i:s'
                );
            }
            
            $d1 = strtotime( $value ); 
            $d2 = strtotime( $parameters[0] ); 

            return $d1-$d2 <= $parameters[1];
        } );        


        Validator::extend( 'boolean_strict', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        )
        {   
            if ( 
                $value === true 
                || $value === false
            ) {
                return true;
            }

            return false;
        } );                             


        Validator::extend( 'alpha_blanks', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^[a-zA-Z]+(( [a-zA-Z]+)?)+$/',
                $value
            );
        } );


        Validator::extend( 'snake_case', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^([a-z]+((_)[a-z]+)?)+$/',
                $value
            );
        } );


        Validator::extend( 'camel_case', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^([a-z]+([A-Z]{1}[a-z]+)+?)([A-Z]{1})?$/',
                $value
            );
        } );


        Validator::extend( 'pascal_case', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^([a-z]+([A-Z]{1}[a-z]+)+?)([A-Z]{1})?$/',
                $value
            );
        } );        


        Validator::extend( 'kebab_case', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^([a-z]+((-)[a-z]+)?)+$/',
                $value
            );
        } );


        Validator::extend( 'geo_distance', function ( 
            $attribute, 
            $value, 
            $parameters, 
            $validator
        ) 
        {   
            return preg_match(
                '/^[0-9]+(km|m)?$/', 
                $value
            );
        } );        

    }


    public function boot () {
        
    }    

}