<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Beneficiario::class, function (Faker\Generator $faker) {
   
    return [
        'nombre' => $faker->name,
        'ap_paterno' => $faker->firstName,
        'ap_materno' => $faker->lastName,
        'domicilio' => '13 de enero #45 bucharest',
        'comunidad' => 'Huichapan',
        'fecha_nacimiento' => date("Y-m-d"),
        'fecha_registro' => date("Y-m-d h:m:s"),
        'tb_usuarios_id_usuario' => 1,
    ];
});

$factory->define(App\Medicamento::class, function (Faker\Generator $faker) {
   
    return [
        'nombre_comercial' => $faker->name,
        'nombre_compuesto' => $faker->firstName,
        'num_etiqueta' => 'D-' . rand(0, 100),
        'num_folio' => 'GR-' . rand(0, 100),
        'fecha_caducidad' =>  date("Y-m-d"),
        'cantidad' => rand(1,30),
        'solucion_tableta' => 'tableta',
        'tipo_contenido' => 'mg',
    ];
});