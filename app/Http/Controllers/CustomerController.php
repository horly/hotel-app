<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerForm;
use App\Models\Customer;
use App\Repository\GenerateRefenceNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    protected $request;
    protected $generateReferenceNumber;

    function __construct(Request $request, GenerateRefenceNumber $generateReferenceNumber)
    {
        $this->request = $request;
        $this->generateReferenceNumber = $generateReferenceNumber;
    }

    public function customers()
    {
        $customers = DB::table('customers')->orderBy('id', 'desc')->get();
        return view('app.customer.customer', compact('customers'));
    }

    public function add_customer($id)
    {
        $customer = DB::table('customers')->where('id', $id)->first();
        $id_customer = $id;
        $reference = null;
        $refNum = 0;

        if($customer)
        {
            $refNum = $customer->reference_number;
            $reference = $customer->reference_cust;
            $id_customer = $customer->id;
        }
        else
        {
            $refNum = $this->generateReferenceNumber->getReferenceNumber("customers");
            $reference = $this->generateReferenceNumber->generate("CUST", $refNum);
            $id_customer = 0;
        }

        return view('app.customer.add_customer', compact('reference', 'refNum', 'id_customer', 'customer'));
    }

    public function save_customer(CreateCustomerForm $requestF)
    {
        $firtname = $requestF->input('firstNameCust');
        $lastname = $requestF->input('lastNameCust');
        $email = $requestF->input('emailCust');
        $phoneNumber = $requestF->input('phoneCust');
        $address = $requestF->input('addressCust');
        $refNum = $requestF->input('refNum');
        $reference = $requestF->input('reference');
        $id_customer = $requestF->input('id_customer');

        if($requestF->input('customerRequest') == "add")
        {
            Customer::create([
                'reference_cust' => $reference,
                'reference_number' => $refNum,
                'firtName' => $firtname,
                'lastName' => $lastname,
                'emailAddr' => $email,
                'phoneNumber' => $phoneNumber,
                'address' => $address,
            ]);

            return redirect()->route('app_customers')->with('success', __('client.customer_added_successfully'));
        }
        else
        {
            DB::table('customers')
                ->where('id', $id_customer)
                ->update([
                    'firtName' => $firtname,
                    'lastName' => $lastname,
                    'emailAddr' => $email,
                    'phoneNumber' => $phoneNumber,
                    'address' => $address,
                    'updated_at' => new \DateTimeImmutable,
            ]);

            return redirect()->route('app_customers')->with('success', __('client.customer_updated_successfully'));
        }
    }
}
