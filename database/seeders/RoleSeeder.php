<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Schema;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            Schema::disableForeignKeyConstraints();
            DB::table('roles')->truncate();
            Schema::enableForeignKeyConstraints();
            $statusPegawai = [
                ['name' => 'super-admin','display_name' => 'Super Admin','description'=>'Super Admin'],

                ['name' => 'pasien','display_name' => 'Pasien','description'=>'Psien'],



            ];
            foreach ($statusPegawai as $status) {
                Role::create($status);
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
