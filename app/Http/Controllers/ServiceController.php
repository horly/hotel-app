<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceForm;
use App\Models\Service;
use App\Repository\GenerateRefenceNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    //
    protected $request;
    protected $generateReferenceNumber;

    function __construct(Request $request, GenerateRefenceNumber $generateReferenceNumber)
    {
        $this->request = $request;
        $this->generateReferenceNumber = $generateReferenceNumber;
    }

    public function services()
    {
        $services = DB::table('services')->get();

        $deviseGest = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devise_gestions.default_cur_manage' => 1,
        ])->first();

        return view('app.services.services', compact('deviseGest', 'services'));
    }

    public function add_services($id)
    {
        $service = DB::table('services')->where('id', $id)->first();

        $id_service = $id;

        $reference = null;
        $refNum = 0;

        $deviseGest = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devise_gestions.default_cur_manage' => 1,
        ])->first();

        if($service)
        {
            $reference = $service->reference_service;
        }
        else
        {
            $refNum = $this->generateReferenceNumber->getReferenceNumber("services");
            $reference = $this->generateReferenceNumber->generate("SERV", $refNum);
        }

        return view('app.services.add_services', compact('service', 'id_service', 'reference', 'deviseGest', 'refNum'));
    }

    public function save_service(CreateServiceForm $requestF)
    {
        $id_service = $requestF->input('id_service');
        $service_name = $requestF->input('service_name');
        $service_descpt = $requestF->input('service_descpt');
        $service_price = $requestF->input('service_price');
        $refNum = $requestF->input('refNum');
        $reference = $requestF->input('reference');
        $customerRequest = $requestF->input('customerRequest');


        if($customerRequest != "edit")
        {
            Service::create([
                'reference_service' => $reference,
                'reference_number' => $refNum,
                'name' => $service_name,
                'description' => $service_descpt,
                'price' => $service_price,
            ]);

            return redirect()->route('app_services')->with('success', __('service.service_added_successfully'));
        }
        else
        {
            DB::table('services')
                ->where('id', $id_service)
                ->update([
                    'name' => $service_name,
                    'description' => $service_descpt,
                    'price' => $service_price,
                    'updated_at' => new \DateTimeImmutable,
                ]);

            return redirect()->route('app_services')->with('success', __('service.service_updated_successfully'));
        }
    }
}
