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
use Illuminate\Database\QueryException;

class InvoiceController extends Controller
{
    //
    public function __construct()
    {
        $this->route      ='invoice.';
        $this->view       ='invoice.';

        $this->sidebar    ='';
        $this->str_kode   = 'INV';
        $this->dateTime   = new DateTime();

    }

    public function index(Request $request){

        return view($this->view.'index',[]);
    }
    public function datatable(Request $request){
        $datas = collect([]);

        $datas = Invoice::with([
                        'pasien'
                  ]);

        $datas = $datas->whereNull('deleted_at')->get();
        return DataTables::of($datas)->toJson();
    }
    public function create(Request $request){
        return view($this->view.'create',[]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'harga'                  => 'required',
            'keterangan'             => 'required',

        ]);
        DB::beginTransaction();
        try {
            $createBarang = Barang::create([
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'nama' => $this->generateKode(),
            ]);



           DB::commit();

        //     // all good
        } catch (QueryException $e) {
            DB::rollback();
            return back()->withErrors(['msg' => 'Gagal Menambah Data Barang']);
            // something went wrong
        }

        return redirect()->route($this->route.'index')
        ->with('success', 'Proses Menambah Data Barang berhasil!');
    }
    public function edit(Request $request,$id){
        $data = Barang::with([])->where('id',$id)->first();

        return view($this->view.'edit',['data'=>$data]);
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'harga'                  => 'required',
            'keterangan'             => 'required',

        ]);
        DB::beginTransaction();
        try {
            $updateBarang = Barang::with([])->where('id',$id)->update([
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,

            ]);
           DB::commit();

        //     // all good
        } catch (QueryException $e) {
            DB::rollback();
            return back()->withErrors(['msg' => 'Gagal Mengupdate Data Barang']);
            // something went wrong
        }

        return redirect()->route($this->route.'index')
        ->with('success', 'Proses Mengupdate Data Barang berhasil!');
    }
    public function delete(Request $request, $id){
        DB::beginTransaction();


        try {


           Invoice::with([])->where('id',$id)->delete();
           InvoiceDetail::with([])->where('invoice_id',$id)->delete();

           DB::commit();

        //     // all good
        } catch (QueryException $e) {
            DB::rollback();
            return back()->withErrors(['msg' => 'Gagal Menghapus Data Barang']);
            // something went wrong
        }

        return back()->with('success', 'Berhasil Menghapus Data Barang!');
    }
    public function generateKode(){
        $code = $this->str_kode.'-'.substr($this->dateTime->format('Y'),-2). "".$this->dateTime->format('m')."0000" ;
        $datas = Barang::with([])->where('nama','LIKE',$this->str_kode.'-'.substr($this->dateTime->format('Y'),-2)."".$this->dateTime->format('m').'%')
                    ->orderByDesc('nama')->get();
        if(sizeof($datas)){
            $code = $datas[sizeof($datas)-1]->nama;
        }
        $substrInt = (int) substr($code, -4);

        $substrFront = substr($code, 0,8);

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
