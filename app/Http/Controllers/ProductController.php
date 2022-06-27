<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use DB;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('products');
            // $data->orderBy('products.updated_at', 'DESC');

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

        return view('product.index');
    }

    public function store(Request $request)
    {
        if ($request->id == null) {
            $validator = Validator::make($request->all(), [
                'nama_product' => 'required',
                'tipe_product' => 'required',
                'price' => 'required',
            ]);
        }
        if ($request->id != null) {
            $validator = Validator::make($request->all(), [
                'nama_product' => 'required',
                'tipe_product' => 'required',
                'price' => 'required',
            ]);
        }
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            Product::updateOrCreate(
                ['id' => $request->id],
                [
                    'nama_product' => $request->nama_product,
                    'tipe_product' => $request->tipe_product,
                    'price' => $request->price,
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
        $data = Product::find($id);
        return response()->json($data);
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function show(Request $request)
    {
        $data = DB::table('products')
            ->select('products.price')
            ->where('products.nama_product', $request->nama_product)
            ->first();

        return response()->json($data);
    }
}
