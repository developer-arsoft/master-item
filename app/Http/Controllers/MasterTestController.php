<?php

namespace App\Http\Controllers;

use ArsoftModules\Keuangan\Keuangan;
use Exception;
use Illuminate\Support\Facades\DB;

class MasterTestController extends Controller
{
    // --- start: test
    public function laporanAsetEta()
    {
        DB::beginTransaction();
        try {
            $arsKeuangan = new Keuangan();
            $reportAsetEta = $arsKeuangan->reportAsetEta(
                'MB0000001',
                '2020-01',
                '2021-03',
                'month'
            );

            if ($reportAsetEta->getStatus() !== 'success') {
                throw new Exception($reportAsetEta->getErrorMessage(), 1);
            }

            $reportAsetEta = $reportAsetEta->getData();

            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => $reportAsetEta
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function laporanCashflow()
    {
        DB::beginTransaction();
        try {
            $arsKeuangan = new Keuangan();
            $reportCashflow = $arsKeuangan->reportCashflow(
                'MB0000001',
                '2020-01',
                '2020-12',
                'month'
            );

            if ($reportCashflow->getStatus() !== 'success') {
                throw new Exception($reportCashflow->getErrorMessage(), 1);
            }

            $reportCashflow = $reportCashflow->getData();

            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => $reportCashflow
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
    // --- end: test
}
