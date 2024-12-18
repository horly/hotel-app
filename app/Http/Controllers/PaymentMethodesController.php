<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodForm;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentMethodesController extends Controller
{
    //
    //
    protected $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function paymentMethods()
    {
        $deviseGest = DB::table('devises')
                    ->join('devise_gestions', 'devise_gestions.id_devise', '=', 'devises.id')
                    ->where([
                        //'devise_gestion_ufs.id_fu' => $functionalUnit->id,
                        'devise_gestions.default_cur_manage' => 1,
        ])->first();

        $paymentMethods = DB::table('devises')
                            ->join('devise_gestions', 'devises.id' , '=', 'devise_gestions.id_devise')
                            ->join('payment_methods', 'devise_gestions.id', '=', 'payment_methods.id_currency')
                            //->where('payment_methods.id_fu', $id2)
                            ->orderBy('payment_methods.id', 'asc')
                            ->get();


        return view('app.payment_methods.payment_methods', compact(
            'deviseGest',
            'paymentMethods',
        ));
    }

    public function addNewPaymentMethods()
    {
        $deviseGest = DB::table('devise_gestions')->where([
            //'id_fu' => $functionalUnit->id,
            'default_cur_manage' => 1,
        ])->first();

        $deviseDefault = DB::table('devises')
            ->join('devise_gestions', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where('devises.id', $deviseGest->id_devise)
            ->first();

        $deviseGests = DB::table('devises')
            ->join('devise_gestions', 'devise_gestions.id_devise', '=', 'devises.id')
            ->orderBy('devise_gestions.id', 'desc')
            ->get();

        return view('app.payment_methods.add_new_payment_methods', compact(
            'deviseGests',
            'deviseDefault'
            )
        );
    }

    public function createPaymentMethods(PaymentMethodForm $requestF)
    {
        $id_payment_methods = $requestF->input('id_payment_methods');
        $customerRequest = $requestF->input('customerRequest');
        $designation_pay_meth = $requestF->input('designation_pay_meth');
        $instu_name_pay_meth = $requestF->input('instu_name_pay_meth');
        $devise_pay_meth = $requestF->input('devise_pay_meth');
        $account_number_pay_meth = $requestF->input('account_number_pay_meth');
        $bic_swift_pay_meth = $requestF->input('bic_swift_pay_meth');
        $iban_pay_meth = $requestF->input('iban_pay_meth');

        if($customerRequest != "edit")
        {
            $payMeth = PaymentMethod::create([
                'designation' => $designation_pay_meth,
                'institution_name' => $instu_name_pay_meth,
                'iban' => $iban_pay_meth,
                'account_number' => $account_number_pay_meth,
                'bic_swiff' => $bic_swift_pay_meth,
                'id_currency' => $devise_pay_meth,
            ]);

            return redirect()->route('app_payment_methods')
                    ->with('success', __('payment_methods.payment_method_added_successfully'));
        }
        else
        {
            DB::table('payment_methods')
                ->where('id', $id_payment_methods)
                ->update([
                    'designation' => $designation_pay_meth,
                    'institution_name' => $instu_name_pay_meth,
                    'iban' => $iban_pay_meth,
                    'account_number' => $account_number_pay_meth,
                    'bic_swiff' => $bic_swift_pay_meth,
                    'id_currency' => $devise_pay_meth,
                    'updated_at' => new \DateTimeImmutable,
            ]);

            return redirect()->route('app_payment_methods')
                    ->with('success', __('payment_methods.payment_method_updated_successfully'));
        }
    }

    public function infoPaymentMethods($id)
    {
        $deviseGest = DB::table('devises')
                    ->join('devise_gestions', 'devise_gestions.id_devise', '=', 'devises.id')
                    ->where([
                        'devise_gestions.default_cur_manage' => 1,
        ])->first();

        $paymentMethod = DB::table('devises')
                            ->join('devise_gestions', 'devises.id' , '=', 'devise_gestions.id_devise')
                            ->join('payment_methods', 'devise_gestions.id', '=', 'payment_methods.id_currency')
                            ->where('payment_methods.id', $id)
                            ->first();

        $paymentReceived = DB::table('encaissements')
                            ->where([
                                'id_pay_meth' => $paymentMethod->id,
                            ])->sum('amount');

        $encaissement_exit = DB::table('encaissements')->where('id_pay_meth', $paymentMethod->id)->first();
        //$decaissement_exit = DB::table('encaissements')->where('id_pay_meth', $paymentMethod->id)->first();

        $encaissements = DB::table('encaissements')->where('id_pay_meth', $paymentMethod->id)->orderBy('id', 'desc')->get();
        //$decaissements = DB::table('decaissements')->where('id_pay_meth', $paymentMethod->id)->orderBy('id', 'desc')->get();

        return view('app.payment_methods.info_payment_methods', compact(
            'deviseGest',
            'paymentMethod',
            'paymentReceived',
            'encaissement_exit',
            'encaissements',
            //'decaissement_exit'
        ));
    }

    public function upDatePaymentMethods($id)
    {
        $deviseGests = DB::table('devises')
            ->join('devise_gestions', 'devise_gestions.id_devise', '=', 'devises.id')
            ->orderBy('devise_gestions.id', 'desc')
            ->get();

        $paymentMethod = DB::table('devises')
                            ->join('devise_gestions', 'devises.id' , '=', 'devise_gestions.id_devise')
                            ->join('payment_methods', 'devise_gestions.id', '=', 'payment_methods.id_currency')
                            ->where('payment_methods.id', $id)
                            ->first();

        $devisePaymethod = DB::table('devises')
                            ->join('devise_gestions', 'devises.id' , '=', 'devise_gestions.id_devise')
                            ->where('devise_gestions.id', $paymentMethod->id_currency)
                            ->first();

        $encaissement_exit = DB::table('encaissements')->where('id_pay_meth', $paymentMethod->id)->first();
        //$decaissement_exit = DB::table('encaissements')->where('id_pay_meth', $paymentMethod->id)->first();

        return view('app.payment_methods.update_payment_methods', compact(
            'deviseGests',
            'paymentMethod',
            'devisePaymethod',
            'encaissement_exit',
        ));
    }
}
