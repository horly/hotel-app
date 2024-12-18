<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyForm;
use App\Http\Requests\MainCurrencyForm;
use App\Models\DeviseGestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviseController extends Controller
{
    //
    protected $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function currency()
    {
        $devises = DB::table('devises')->orderBy('iso_code')->get();

        $deviseGest = DB::table('devise_gestions')->where([
            'default_cur_manage' => 1,
        ])->first();

        $deviseDefault = null;

        if($deviseGest)
        {
            $deviseDefault = DB::table('devise_gestions')
                ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
                ->where('devises.id', $deviseGest->id_devise)
                ->first();
        }


        $deviseHOT = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->orderBy('devise_gestions.id', 'desc')
            ->get();

        return view('app.devise.devise', compact('devises', 'deviseGest', 'deviseDefault', 'deviseHOT'));
    }

    public function create_currency($id)
    {
        $devises = DB::table('devises')->orderBy('iso_code')->get();
        $devise = DB::table('devises')->where('id', $id)->first();

        $deviseGest = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devise_gestions.default_cur_manage' => 1,
        ])->first();

        $dev = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devises.id' => $id,
        ])->first();


        return view('app.devise.create_currency', compact('devises', 'deviseGest', 'devise', 'dev'));
    }

    public function change_default_currency(MainCurrencyForm $requestF)
    {
        $main_currency = $requestF->input('main_currency');

        DB::table('devise_gestions')
                ->update([
                    'default_cur_manage' => 0
        ]);

        DB::table('devise_gestions')
                ->where('id_devise', $main_currency)
                ->update([
                    'default_cur_manage' => 1,
                    'taux' => 1,
        ]);

        return redirect()->back()->with('success', __('dashboard.default_currency_updated_successfully'));
    }

    public function save_currency(CurrencyForm $requestF)
    {
        $id_currency_gest = $requestF->input('id_currency_gest');
        $fuRequest = $requestF->input('fuRequest');
        $currency_name_dev = $requestF->input('currency_name_dev');
        $rate_currency_dev = $requestF->input('rate_currency_dev');

        if($fuRequest != "edit")
        {
            $existDevise = DB::table('devise_gestions')
                    ->where([
                        'id_devise' => $currency_name_dev
                ])->first();

            if(!$existDevise)
            {
                $currecy_saved = DeviseGestion::create([
                    'taux' => $rate_currency_dev,
                    'id_devise' => $currency_name_dev,
                ]);

                return redirect()->route('app_currency')
                            ->with('success', __('dashboard.currency_added_successfully'));
            }
            else
            {
                return redirect()->back()->with('danger', __('dashboard.this_currency_has_already_been_added'));
            }
        }
        else
        {
            DB::table('devise_gestions')
                    ->where('id_devise', $id_currency_gest)
                    ->update([
                        'taux' => $rate_currency_dev,
                        'id_devise' => $currency_name_dev,
            ]);

            return redirect()->route('app_currency')
                    ->with('success', __('dashboard.currency_updated_successfully'));
        }
    }

    public function info_currency($id)
    {
        $deviseGest = DB::table('devise_gestions')->where([
            'default_cur_manage' => 1,
        ])->first();

        $deviseDefault = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where('devises.id', $deviseGest->id_devise)
            ->first();

        $devise = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where('devises.id', $id)->first();

        return view('app.devise.info_currency', compact('devise', 'deviseDefault'));
    }

    public function delete_currency()
    {
        $id_currency = $this->request->input('id_element');

        DB::table('devise_gestions')
                    ->where([
                        'id_devise' => $id_currency
        ])->delete();

        return redirect()->route('app_currency')->with('success', __('dashboard.currency_deleted_successfully'));
    }
}
