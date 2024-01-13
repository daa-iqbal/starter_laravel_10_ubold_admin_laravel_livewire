<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use DB;
use App\Models\Barang;
use Illuminate\Database\QueryException;

class BarangSeeder extends Seeder
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
        $this->str_kode   = 'P';

    }
    public function run()
    {
        //
        DB::beginTransaction();
        try {//


            $kodeAngka = '';
            $modTahun = $this->tahun % 100;
            $createBarang = NULL;
            foreach ( $this->bulan as $key => $bulan) {
                for ($i=1; $i<200; $i++) {
                    if($i < 10){
                        $kodeAngka = '000'.$i;
                    }
                    elseif ($i>=10 && $i<100 ) {
                        $kodeAngka = '00'.$i;
                    }
                    elseif ($i>=100 && $i<1000) {
                        $kodeAngka = '0'.$i;
                    }
                    $createBarang =  Barang::create([
                        'nama' => $this->str_kode.'-'.$modTahun.$bulan.$kodeAngka,
                        'harga' => random_int(1, 100) * 1000,
                    ]);
                    $this->command->info(print_r($createBarang));
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
