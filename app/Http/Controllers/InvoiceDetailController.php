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


class InvoiceDetailController extends Controller
{
    //
    public function __construct()
    {
        $this->route      ='invoice_detail.';
        $this->view       ='invoice_detail.';

        $this->sidebar    ='';

    }

    public function index(Request $request,$id){

        return view($this->view.'index',[]);
    }
    public function datatable(Request $request,$id){
        $datas = collect([]);

        $datas = InvoiceDetail::with([
                                'invoice',
                                'invoice.pasien',
                                'barang'
        ])->where('invoice_id',$id);

        $datas = $datas->whereNull('deleted_at')->get();
        return DataTables::of($datas)->toJson();
    }
}
