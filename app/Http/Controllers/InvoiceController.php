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
}
