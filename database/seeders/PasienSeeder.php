<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use DB;
use Illuminate\Database\QueryException;
use App\Models\Role;
use Faker\Factory as Faker;
use App\Models\User;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tahun      = 2023;
        $this->bulan      = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $this->str_kode   = 'EM';
        $this->faker      = Faker::create(config('app.faker_icu'));

    }

    public function run()
    {
        //
        DB::beginTransaction();
        try {//
            $persistedRole = Role::with([])->where('name','pasien')->first();
            if($persistedRole){
                $kodeAngka = '';
                $modTahun = $this->tahun % 100;
                $createPasien = NULL;
                $name = '';
                foreach ( $this->bulan as $key => $bulan) {
                    for ($i=1; $i<50; $i++) {
                        if($i < 10){
                            $kodeAngka = '000'.$i;
                        }
                        elseif ($i>=10 && $i<100 ) {
                            $kodeAngka = '00'.$i;
                        }
                        elseif ($i>=100 && $i<1000) {
                            $kodeAngka = '0'.$i;
                        }
                        $name = $this->faker->name;
                        $createPasien =  User::create([
                                'name' => $name,
                                'kode'=> $this->str_kode.'-'.$modTahun.$bulan.$kodeAngka,
                                'email' =>  strtolower(str_replace(' ','',$name)).random_int(1, 99).'@gmail.com',
                                'phone' => '08'.$this->tahun.$bulan.$kodeAngka,
                                'password' => 'bismillah',
                                'is_active' => 1,
                                'built_in' => 0,
                            ]);
                        $createPasien->attachRole($persistedRole);
                        $this->command->info(print_r($createPasien));

                    }
                }
            }

            DB::commit();

            //     // all good
        } catch (QueryException $e) {
            DB::rollback();
            $this->command->info($e->getMessage());
            // something went wrong
        }
    }
}
