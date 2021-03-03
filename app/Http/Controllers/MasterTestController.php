<?php

namespace App\Http\Controllers;

use ArsoftModules\MasterItem\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterTestController extends Controller
{
    public function __construct()
    {
        $this->itemController = new ItemController();
    }

    public function getItems()
    {
        DB::beginTransaction();
        try {
            $listItems = $this->itemController->index();

            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => $listItems
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeItem()
    {
        DB::beginTransaction();
        try {
            $listItems = $this->itemController->store();

            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => $listItems
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showItem($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->itemController->show($id);

            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateItem(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->itemController->update($id);

            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteItem($id)
    {
        DB::beginTransaction();
        try {
            $this->itemController->destroy($id);

            DB::commit();
            return response()->json([
                'status' => 'success',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
