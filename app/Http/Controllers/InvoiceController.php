<?php

namespace App\Http\Controllers;

use Validator;
use App\Agent;
use App\Bank;
use App\Client;
use App\Country;
use App\Invoice;
use App\InvoiceInfo;
use App\Income;
use App\Package;
use App\VisaType;
use App\CompanyInfo;


use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $invoice = Invoice::all();
        $title = 'All Invoice';
        $icon = 'mdi mdi-clipboard-text';
        return view('invoice.index', compact( 'invoice', 'title','icon'))->with('no', 1);
    }
    public function add() {
        $invoice = new Invoice();

        $lastInvoiceID = $invoice->orderBy('id', 'desc')->pluck('id')->first();
        $invoiceno = 'INV-'.date('Y').'-'.($lastInvoiceID + 1);
    /*    $record = Invoice::latest()->first();
        $expNum = explode('-', $record['invoice_no']);

            //check first day in a year
        if ( date('l',strtotime(date('y'))) ){
            $invoiceno = 'INV-'.date('y').'-1001';
        } else {
            //increase 1 with last invoice number
            $invoiceno = 'INV-'.$expNum[0].'-'. $expNum[1]+1;
        }*/

        $agent_id = Agent::where("status",1)->get();
        $country_id = Country::where("status",1)->get();
        $visa_type = VisaType::where("status",1)->get();
        $package_id = Package::where("status",1)->get();
        $bank_id = Bank::where("status",1)->get();
        $title = 'Add Invoice';
        $icon = 'mdi mdi-clipboard-text';
        return view('invoice.add', compact('agent_id', 'bank_id', 'country_id', 'package_id', 'visa_type', 'invoiceno', 'title','icon'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'invoice_no' => 'required|max:255',
            'invoice_date' => 'required|max:255',
            'client_id' => 'nullable',
            'agent_id' => 'required',
            'regi_type' => 'required',
            'year' => 'max:255|nullable',
            'country_id' => 'required|max:255',
            'visa_type' => 'required|max:255',
            'payment_type' => 'required|max:255',
            'bank_id' => 'nullable|max:255',
            'cheque_no' => 'nullable|max:255',
            'sub_total' => 'required|max:255',
            'discount_percent' => 'nullable|max:255',
            'grand_total' => 'required|max:255',
            'paid_amount' => 'nullable|max:255',
            'due_amount' => 'nullable|max:255',
            'pack_id[]' => 'nullable|max:255',
            'remarks[]' => 'nullable|max:255',
            'quantity[]' => 'nullable|max:255',
            'price[]' => 'nullable|max:255',
            'total_amount[]' => 'nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $invoices= new Invoice;
        $invoices->invoice_no=$request->invoice_no;
        $invoices->invoice_date=date('Y-m-d',strtotime($request->invoice_date));
        $invoices->agent_id=$request->agent_id;
        $invoices->client_id=$request->client_id;
        $invoices->regi_type=$request->regi_type;
        $invoices->year=$request->year;
        $invoices->country_id=$request->country_id;
        $invoices->visa_type=$request->visa_type;
        $invoices->payment_type=$request->payment_type;
        $invoices->bank_id=$request->bank_id;
        $invoices->cheque_no=$request->cheque_no;
        $invoices->sub_total=$request->sub_total;
        $invoices->discount_percent=$request->discount_percent;
        $invoices->grand_total=$request->grand_total;
        $invoices->paid_amount=$request->paid_amount;
        $invoices->due_amount=$request->due_amount;

        if($invoices->save()){
            $id=$invoices->id;
            foreach ($request->pack_id as $key => $vl){
                $data = array(
                    'invoice_id'=>$id,
                    'pack_id'=>$vl,
                    'remarks'=>$request->remarks [$key],
                    'quantity'=>$request->quantity [$key],
                    'price'=>$request->price [$key],
                    'total_amount'=>$request->total_amount [$key],
                );
                InvoiceInfo::insert($data);
            }

            $datap = array(
                'inv_id'=>$id,
                'pay_amount'=>$request->paid_amount,
            );
            Income::insert($datap);
        }
        return redirect()->to('/invoice');
    }

    public function unitPrice(Request $request)
    {
        $data = Package::all()->where('id',$request->id)->first();
        return response()->json($data);
    }
    public function agentID(Request $request)
    {
        $data = Client::all()->where('id',$request->id)->first();
        return response()->json($data);
    }


    public function edit($id) {
        $record = Invoice::latest()->first();
        $expNum = explode('-', $record['invoice_no']);

            //check first day in a year
        if ( date('l',strtotime(date('y'))) ){
            $invoiceno = 'INV-'.date('y').'-1001';
        } else {
            //increase 1 with last invoice number
            $invoiceno = 'INV-'.$expNum[0].'-'. $expNum[1]+1;
        }

        $agent_id = Agent::where("status",1)->get();
        $client_id = Client::where("status",1)->get();
        $country_id = Country::where("status",1)->get();
        $visa_type = VisaType::where("status",1)->get();
        $package_id = Package::where("status",1)->get();
        $bank_id = Bank::where("status",1)->get();
        $invoiceId = Invoice::findOrFail($id);
        $invoiceinfo = InvoiceInfo::where('invoice_id', $id)->get();
        $invoicepay = Income::where('inv_id',$id)->get();
        $title = 'Edit Invoice';
        $icon = 'mdi mdi-clipboard-text';
        return view('invoice.edit', compact('invoiceId', 'invoiceinfo', 'invoicepay', 'agent_id', 'client_id', 'bank_id', 'country_id', 'package_id', 'visa_type', 'invoiceno', 'title','icon'));
    }
    public function update(Request $request, $id) {
        $invoiceId = Invoice::findOrFail($id);

            $invoiceId->invoice_no = request('invoice_no');
            $invoiceId->invoice_date = request('invoice_date');
            $invoiceId->agent_id = request('agent_id');
            $invoiceId->client_id = request('client_id');
            $invoiceId->regi_type = request('regi_type');
            $invoiceId->year = request('year');
            $invoiceId->country_id = request('country_id');
            $invoiceId->visa_type = request('visa_type');
            $invoiceId->payment_type = request('payment_type');
            $invoiceId->bank_id = request('bank_id');
            $invoiceId->cheque_no = request('cheque_no');
            $invoiceId->sub_total = request('sub_total');
            $invoiceId->discount_percent = request('discount_percent');
            $invoiceId->grand_total = request('grand_total');
            $invoiceId->paid_amount = request('paid_amount');
            $invoiceId->due_amount = request('due_amount');

            $invoiceId->update();

        if($invoiceId->update()){
            $id=$invoiceId->id;
            foreach ($request->pack_id as $key => $vl){
                $data = array(
                    'invoice_id'=>$id,
                    'pack_id'=>$vl,
                    'remarks'=>$request->remarks [$key],
                    'quantity'=>$request->quantity [$key],
                    'price'=>$request->price [$key],
                    'total_amount'=>$request->total_amount [$key],
                );
                if($id) {
                InvoiceInfo::where('invoice_id', '=', $id)->update($data);
                } else {
                    InvoiceInfo::insert($data);
                }
            }

            $datap = array(
                'inv_id'=>$id,
                'pay_amount'=>$request->paid_amount,
            );

                Income::whereId($id)->update($datap);

            
        }

        return redirect()->to('/invoice');
    }

    public function delete($id) {
        $invoice_no = Invoice::findOrFail($id);
        $invoice_no->delete();
        $invoice_info = InvoiceInfo::where('invoice_id',$id);
        $invoice_info->delete();
        $invoice_pay = Income::where('inv_id',$id);
        $invoice_pay->delete();
        return redirect()->to('/invoice');
    }

    public function clientID(Request $request)
    {
        $data = Client::where("agent_id",$request->id)
            ->pluck("name","id");
        return response()->json($data);


    }

    public function show($id)
    {
        $company_info = CompanyInfo::first();
        $invoice = Invoice::findOrFail($id);
        $invoice_info = InvoiceInfo::where('invoice_id',$id)->get();
        $title = 'View Invoice';
        $icon = 'mdi mdi-clipboard-text';
        return view('invoice.show', compact('company_info', 'invoice', 'invoice_info', 'title','icon'))->with('no', 1);


    }
}
