<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         DB::table('provincias')->insert([
         	'nombre' => 'Buenos Aires'
                    
        ]);
         DB::table('provincias')->insert([
         	'nombre' => 'Catamarca'
                    
        ]);
           DB::table('provincias')->insert([
         	'nombre' => 'Chaco'
                    
        ]);
             DB::table('provincias')->insert([
         	'nombre' => 'Chubut'
                    
        ]);
               DB::table('provincias')->insert([
         	'nombre' => 'Córdoba'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Corrientes'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Entre Ríos'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Formosa'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Jujuy'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'La Pampa'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'La Rioja'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Mendoza'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Misiones'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Neuquén'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Río Negro'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Salta'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'San Juan'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'San Luis'
                    
        ]);
                DB::table('provincias')->insert([
         	'nombre' => 'Santa Cruz'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Santa Fe'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Santiago del Estero'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Tierra del Fuego'
                    
        ]);
                 DB::table('provincias')->insert([
         	'nombre' => 'Tucumán'
                    
        ]);
    }
}






























