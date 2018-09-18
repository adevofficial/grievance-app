<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complient;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {

        $Months = Complient::selectRaw(DB::raw('MONTH(`created_at`) as month'))
            ->groupBy('month')
            ->get();

        $Year = Complient::selectRaw(DB::raw('YEAR(`created_at`) as year'))
            ->groupBy('year')
            ->get();

        return view('reports.index_reports')->with(['Months_Avaliable' => $Months, 'Year_Avaliable' => $Year]);
    }

    public function monthly_report(Request $request)
    {
        $month = $request->input('month');
        $type = $request->input('type');

        $monthName = date('F', mktime(0, 0, 0, $month, 10));

        $MontlyComplaints =   Complient::join('users', 'complients.user_id', '=', 'users.id')
            ->whereMonth("complients.created_at", $month)
            ->selectRaw('`complients`.`id` as ID,`subject` as `Subject`,`category` as `Category`,`message` as `Message`,`name` as `Name`,`email` as `Email`,`complients`.`created_at` as `Created`')
            ->get();

        $ExcelFile = Excel::create("Monthly Grievance Report($monthName)", function ($excel) use ($MontlyComplaints, $monthName) {
            $excel->sheet($monthName, function ($sheet) use ($MontlyComplaints, $monthName) {
                $sheet->fromModel($MontlyComplaints);
                $sheet->prependRow(array(
                    ""
                ));
                $sheet->prependRow(array(
                    "Monthly Grievance Report - $monthName",
                ));

                $sheet->mergeCells('A1:G1');
                $sheet->cell('A1', function ($cell) {
                    $cell->setFontSize('14');
                    $cell->setAlignment('center');
                });

                $sheet->cell('A3:G3', function ($cell) {
                    $cell->setFontWeight('bold');
                    $cell->setAlignment('center');
                });
            });
        });

        if ($type == "xlsx") {
            $ExcelFile->export('xlsx');
        } else {
            $ExcelFile->export('csv');
        }
    }

    public function yearly_report(Request $request)
    {

        $this->validate($request, [
            "year" => "required|numeric",
            "type" => "required|string"
        ]);

        $year = $request->input('year');
        $type = $request->input('type');

        $Months = Complient::selectRaw(DB::raw('MONTH(`created_at`) as month'))
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->get();

        $ExcelFile =  Excel::create("Yearly Grievance Report($year)", function ($excel) use ($year, $Months) {
            foreach ($Months as $key => $Month) {
                $Month = $Month['month'];
                $monthName = date('F', mktime(0, 0, 0, $Month, 10));

                $excel->sheet($monthName, function ($sheet) use ($Month, $monthName) {

                    $MontlyComplaints =   Complient::join('users', 'complients.user_id', '=', 'users.id')
                        ->whereMonth("complients.created_at", $Month)
                        ->selectRaw('`complients`.`id` as ID,`subject` as `Subject`,`category` as `Category`,`message` as `Message`,`name` as `Name`,`email` as `Email`,`complients`.`created_at` as `Created`')
                        ->get();


                    $sheet->fromModel($MontlyComplaints);
                    $sheet->prependRow(array(
                        ""
                    ));
                    $sheet->prependRow(array(
                        "Yearly Grievance Report - $monthName",
                    ));

                    $sheet->mergeCells('A1:G1');
                    $sheet->cell('A1', function ($cell) {
                        $cell->setFontSize('14');
                        $cell->setAlignment('center');
                    });

                    $sheet->cell('A3:G3', function ($cell) {
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');
                    });
                });
            }
        });

        if ($type == "xlsx") {
            $ExcelFile->export('xlsx');
        } else {
            $ExcelFile->export('csv');
        }
    }
}
