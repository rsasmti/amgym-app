<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use DB;


class PresenceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('presences');
            $data->orderBy('presences.updated_at', 'DESC');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Show" class="show btn btn-primary btn-sm showData"><i class="far fa-eye"></i></a>';
                    $btn .= '&nbsp;';
                    $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm editData"><i class="far fa-edit"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="far fa-trash-alt"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $customers = DB::table('customers')
            ->pluck("name", "name");

        $products = DB::table('products')
            ->pluck("nama_product", "nama_product");

        // return view('Presence.index');
        return view('presence.index', compact('customers','products'));

    }

    public function store(Request $request)
    {
        if ($request->id == null) {
            $validator = Validator::make($request->all(), [
                'presence_date' => 'required',
                'customer_name' => 'required',
                'nama_product' => 'required',
                'price' => 'required',
                'end_of_membership' => 'required',
            ]);
        }
        if ($request->id != null) {
            $validator = Validator::make($request->all(), [
                'presence_date' => 'required',
                'customer_name' => 'required',
                'nama_product' => 'required',
                'price' => 'required',
                'end_of_membership' => 'required',
            ]);
        }
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            Presence::updateOrCreate(
                ['id' => $request->id],
                [
                    'presence_date' => $request->presence_date,
                    'customer_name' => $request->customer_name,
                    'nama_product' => $request->nama_product,
                    'price' => $request->price,
                    'end_of_membership' => $request->end_of_membership,
                ]
            );
            $save = true;
            if ($save) {
                return response()->json(['status' => 1,]);
            }
        }
    }

    public function edit($id)
    {
        $data = Presence::find($id);
        return response()->json($data);
    }

    public function destroy($id)
    {
        Presence::find($id)->delete();
    }

    public function transactionsData(Request $request)
    {
        $data = DB::table('transactions')
            ->select('transactions.*')
            ->where('transactions.customer_name', $request->customer_name)
            ->first();

        return response()->json($data);
    }
}
