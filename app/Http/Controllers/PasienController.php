<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DB;
use stdClass;
use DateTime;
use DateInterval;
use Validator;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Barang;
use App\Models\User;
use Auth;
use DataTables;
use App\Models\Role;
use Illuminate\Database\QueryException;

class PasienController extends Controller
{
    //
    public function __construct()
    {
        $this->route      ='pasien.';
        $this->view       ='pasien.';

        $this->sidebar    ='';
        $this->str_kode   = 'EM';
        $this->dateTime   = new DateTime();
        $this->except_email = ['super.admin@clinic.id','admin@clinic.id'];

    }

    public function index(Request $request){

        return view($this->view.'index',[]);
    }
    public function datatable(Request $request){
        $datas = collect([]);

        $datas = User::with([

                  ])->whereNotIn('email',$this->except_email);

        $datas = $datas->whereNull('deleted_at')->get();
        return DataTables::of($datas)->toJson();
    }
    public function create(Request $request){
        return view($this->view.'create',[]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users',
            'phone'                 => 'required',



        ]);
        DB::beginTransaction();
        try {
            $persistedRole = Role::with([])->where('name','pasien')->first();
            $createPasien = User::create([
                'name' => $request->name,
                'kode'=> $this->generateKode(),
                'email' =>  $request->email,
                'phone' => $request->phone,
                'password' => 'bismillah',
                'is_active' => 1,
                'built_in' => 0,
            ]);

            $createPasien->attachRole($persistedRole);



           DB::commit();

        //     // all good
        } catch (QueryException $e) {
            DB::rollback();
            return back()->withErrors(['msg' => 'Gagal Menambah Data Pasien']);
            // something went wrong
        }

        return redirect()->route($this->route.'index')
        ->with('success', 'Proses Menambah Data Pasien berhasil!');
    }
    public function edit(Request $request,$id){
        $data = User::with([])->where('id',$id)->first();

        return view($this->view.'edit',['data'=>$data]);
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email,'.$id,
            'phone'                 => 'required',

        ]);
        DB::beginTransaction();
        try {
            $updatePasien = User::with([])->where('id',$id)->update([
                'name' => $request->name,

                'email' =>  $request->email,
                'phone' => $request->phone,

            ]);
           DB::commit();

        //     // all good
        } catch (QueryException $e) {
            DB::rollback();
            return back()->withErrors(['msg' => 'Gagal Mengupdate Data Pasien']);
            // something went wrong
        }

        return redirect()->route($this->route.'index')
        ->with('success', 'Proses Mengupdate Data Pasien berhasil!');
    }
    public function delete(Request $request, $id){
        DB::beginTransaction();


        try {


        User::with([])->where('id',$id)->delete();

           DB::commit();

        //     // all good
        } catch (QueryException $e) {
            DB::rollback();
            return back()->withErrors(['msg' => 'Gagal Menghapus Data Pasien']);
            // something went wrong
        }

        return back()->with('success', 'Berhasil Menghapus Data Pasien!');
    }
    public function generateKode(){
        $code = $this->str_kode.'-'.substr($this->dateTime->format('Y'),-2). "".$this->dateTime->format('m')."0000" ;
        $datas = User::with([])->where('kode','LIKE',$this->str_kode.'-'.substr($this->dateTime->format('Y'),-2)."".$this->dateTime->format('m').'%')
                    ->orderByDesc('kode')->get();
        if(sizeof($datas)){
            $code = $datas[sizeof($datas)-1]->kode;
        }
        $substrInt = (int) substr($code, -4);

        $substrFront = substr($code, 0,7);

        $substrRear = '';
        $substrInt += 1;
        if($substrInt < 10){
            $substrRear = '000'.$substrInt;
        }
        elseif ($substrInt >=10 && $substrInt < 100 ) {
            $substrRear = '00'.$substrInt;
        }
        elseif ($substrInt>=100 && $substrInt<1000) {
            $substrRear = '0'.$substrInt;
        }
        $newCode = $substrFront.$substrRear;

        return $newCode;
    }
}
