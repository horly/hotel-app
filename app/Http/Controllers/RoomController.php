<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomCategoryForm;
use App\Http\Requests\CreateRoomForm;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Repository\GenerateRefenceNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    //
    protected $request;
    protected $generateReferenceNumber;

    function __construct(Request $request, GenerateRefenceNumber $generateReferenceNumber)
    {
        $this->request = $request;
        $this->generateReferenceNumber = $generateReferenceNumber;
    }

    public function room_category()
    {
        $categories = DB::table('room_categories')->get();

        $deviseGest = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devise_gestions.default_cur_manage' => 1,
        ])->first();

        return view('app.room.room_category', compact('categories', 'deviseGest'));
    }

    public function rooms()
    {
        $rooms = DB::table('rooms')->get();

        $deviseGest = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devise_gestions.default_cur_manage' => 1,
        ])->first();

        return view('app.room.room', compact('rooms', 'deviseGest'));
    }

    public function add_room($id)
    {
        $room = DB::table('rooms')->where('id', $id)->first();
        $id_room = $id;
        $room_category = null;

        $room_categories = DB::table('room_categories')->get();

        if($id_room != 0)
        {
            $room_category = DB::table('room_categories')->where('id', $room->id_cat)->first();
        }

        return view('app.room.add_room', compact('room', 'id_room', 'room_categories', 'room_category'));
    }

    public function add_room_category($id)
    {
        $room_category = DB::table('room_categories')->where('id', $id)->first();
        $id_room_cat = $id;

        $deviseGest = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devise_gestions.default_cur_manage' => 1,
        ])->first();

        return view('app.room.add_room_category', compact('room_category', 'id_room_cat', 'deviseGest'));
    }

    public function save_room_category(CreateRoomCategoryForm $requestF)
    {
        $id_room_cat = $requestF->input('id_room_cat');
        $descriptionRoomCat = $requestF->input('descriptionRoomCat');
        $room_cat_price = $requestF->input('room_cat_price');
        $customerRequest = $requestF->input('customerRequest');
        $room_cat_number_of_people = $requestF->input('room_cat_number_of_people');

        if($customerRequest != "edit")
        {
            RoomCategory::create([
                'description' => $descriptionRoomCat,
                'price' => $room_cat_price,
                'people_number' => $room_cat_number_of_people,
            ]);

            return redirect()->route('app_room_category')
                    ->with('success', __('room.room_category_added_successfully'));
        }
        else
        {
            DB::table('room_categories')
                ->where('id', $id_room_cat)
                ->update([
                    'description' => $descriptionRoomCat,
                    'price' => $room_cat_price,
                    'people_number' => $room_cat_number_of_people,
                    'updated_at' => new \DateTimeImmutable,
            ]);

            return redirect()->route('app_room_category')
                    ->with('success', __('room.room_category_updated_successfully'));
        }
    }

    public function save_room(CreateRoomForm $requestF)
    {
        $id_room = $requestF->input('id_room');
        $customerRequest = $requestF->input('customerRequest');
        $room_number = $requestF->input('room_number');
        $room_category = $requestF->input('room_category');

        if($customerRequest != "edit")
        {
            Room::create([
                'room_number' => $room_number,
                'id_cat' => $room_category,
            ]);

            return redirect()->route('app_rooms')
                    ->with('success', __('room.room_added_successfully'));
        }
        else
        {
            DB::table('rooms')
                ->where('id', $id_room)
                ->update([
                    'room_number' => $room_number,
                    'id_cat' => $room_category,
                    'updated_at' => new \DateTimeImmutable,
            ]);

            return redirect()->route('app_rooms')
                    ->with('success', __('room.room_updated_successfully'));
        }
    }
}
