<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use DB;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Barang;
use Faker\Factory as Faker;
use Illuminate\Database\QueryException;
use App\Models\User;

class InvoiceAndInvoiceDetailsSeeder extends Seeder
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
        $this->str_kode   = 'INV';

    }

    public function run()
    {

        //
        DB::beginTransaction();
        try {//
            $pasiens =  User::with([])->whereNotIn('email',['super.admin@clinic.id','admin@clinic.id'])->get();
            $barangs =  Barang::with([])->get();
            $kodeAngka = '';
            $modTahun = $this->tahun % 100;
            $createInvoice = NULL;
            $createInvoiceDetail = NULL;
            $totalHarga = 0;
            $jumlahItem = 0;
            $subTotal = 0;
            foreach ( $this->bulan as $key => $bulan) {
                for ($i=1; $i< 10; $i++) {
                    if($i < 10){
                        $kodeAngka = '000'.$i;
                    }
                    elseif ($i>=10 && $i<100 ) {
                        $kodeAngka = '00'.$i;
                    }
                    elseif ($i>=100 && $i<1000) {
                        $kodeAngka = '0'.$i;
                    }
                    $pasien = $pasiens->random();
                    $createInvoice =  Invoice::create([
                        'no_invoice' => $this->str_kode.'-'.$modTahun.$bulan.$kodeAngka,
                        'user_id' => $pasien->id,
                        'created_at'=> $this->tahun.'-'.$bulan.'-'.random_int(1, 28),
                    ]);
                    $totalHarga = 0;
                    $banyakMacamBarang = random_int(5, 20);
                    $randomBarangs = $barangs->random($banyakMacamBarang);
                    foreach ($randomBarangs as $keyItem => $item) {
                        $jumlahItem = random_int(1, 10);
                        $subTotal = $jumlahItem * $item->harga;
                        $totalHarga += $subTotal;
                        $createInvoiceDetail = InvoiceDetail::create([
                            'barang_id'=> $item->id,
                            'invoice_id'=> $createInvoice->id,
                            'jumlah_barang' => $jumlahItem,
                            'sub_total' => $subTotal,
                        ]);
                        $this->command->info(print_r($createInvoiceDetail));
                        $createInvoice->total = $totalHarga;
                        $createInvoice->save();

                    }
                    $this->command->info(print_r($createInvoice));
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
