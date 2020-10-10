<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Colors;
use App\Models\Countries;
use App\Models\Depts;
use App\Models\Fabrics;
use App\Models\Items;
use App\Models\MTD;
use App\Models\MTI;
use App\Models\MTS;
use App\Models\Seasons;
use App\Models\Sizes;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function index(Request $request)
    {

        $colors = Colors::all();
        $sizes = Sizes::all();
        $depts = Depts::all();
        $items = Items::all();
        $seasons = Seasons::all();
        $types = Types::all();
        $fabrics = Fabrics::all();
        $countries = Countries::all();
        $brands = Brands::all();

        $years = MTI::select('ItemYear')->groupBy('ItemYear')->get();
        return view('itemsFilter.index', compact([
            'colors',
            'sizes',
            'depts',
            'items',
            'seasons',
            'types',
            'fabrics',
            'countries',
            'brands',
            'years',
        ]));
    }

    public function show(Request $request, $ComputerNo){
        $colors = Colors::all();
        $sizes = Sizes::all();
        $depts = Depts::all();
        $items = Items::all();
        $seasons = Seasons::all();
        $types = Types::all();
        $fabrics = Fabrics::all();
        $countries = Countries::all();
        $brands = Brands::all();
        $years = MTI::select('ItemYear')->groupBy('ItemYear')->get();

        $img = 'http://82.137.231.35:100/' . $ComputerNo . '.jpg';
        $branches =  DB::table('MTI')->where('MTI.ComputerNo', '=', $ComputerNo)
            ->join('MTD', 'MTI.ComputerNo', '=', 'MTD.ComputerNo')
            ->join('MTS', 'MTD.Code', '=', 'MTS.Code')
            ->join('Branches', 'MTS.BranchID', '=', 'Branches.BranchID')
            ->select('Branches.BranchName','Branches.BranchID', DB::raw('Sum(MTS.Qty) As total'))
            ->groupBy(['Branches.BranchName','Branches.BranchID'])->having(DB::raw('Sum(ABS(MTS.Qty))') ,'>',0);


        $join = DB::table('MTI')->where('MTI.ComputerNo', '=', $ComputerNo)
            ->join('MTD', 'MTI.ComputerNo', '=', 'MTD.ComputerNo')
            ->join('MTS', 'MTD.Code', '=', 'MTS.Code')
            ->join('Colors', 'MTD.ColorID', '=', 'Colors.ColorID')
            ->join('Sizes', 'MTD.SizeID', '=', 'Sizes.SizeID')
            ->leftJoin('Branches', 'MTS.BranchID', '=', 'Branches.BranchID')->whereIn('Branches.BranchID',$branches->pluck('Branches.BranchID'))
            ->select(
            // 'MTI.ComputerNo',
            // 'MTI.ModelNo',
            // 'MTI.DeptID',
            // 'MTI.ItemID',
            //  'MTI.TypeID',
            //  'MTI.SeasonID',
            //  'MTI.FabricID',
            // 'MTI.CountryID',
            // 'MTI.BrandID',
            // 'MTI.StandNo',
            //'MTI.ItemYear',
            //  'MTI.Des',
            // 'MTI.EndUser',
            // 'MTI.Sale',
            //  'MTI.Special',
            // 'MTI.Clearance',
            // 'MTI.MinPrice',
                'BarCode',
                'ColorName',
                'SizeName',
                'BranchName',
                'MTS.Qty',
                DB::raw('Sum(MTS.Qty) As total')
            )
            ->groupBy([
                //'MTI.ComputerNo',
                //'MTI.ModelNo',
                //'MTI.DeptID',
                // 'MTI.ItemID',
                //'MTI.TypeID',
                // 'MTI.SeasonID',
                // 'MTI.FabricID',
                //  'MTI.CountryID',
                //  'MTI.BrandID',
                // 'MTI.StandNo',
                //  'MTI.ItemYear',
                // 'MTI.Des',
                //  'MTI.EndUser',
                // 'MTI.Sale',
                //'MTI.Special',
                //'MTI.Clearance',
                // 'MTI.MinPrice',
                'MTD.BarCode',
                'Colors.ColorName',
                'Sizes.SizeName',
                'Branches.BranchName',
                'MTS.Qty'
            ]);




        $mti = MTI::where('ComputerNo','=',$ComputerNo);


        return view('itemsFilter.index', [
            'colors' => $colors,
            'sizes' => $sizes,
            'depts' => $depts,
            'items' => $items,
            'seasons' => $seasons,
            'types' => $types,
            'fabrics' => $fabrics,
            'countries' => $countries,
            'brands' => $brands,
            'years' => $years,
            'report' => true,
            'mti' => $mti->first(),
            'join' => $join->get()->groupBy('BarCode'),
            'branches' => $branches->get(),
            'tot' => $join->get()->groupBy('BranchName')->map(function ($row) {
                return $row->sum('Qty');
            }),
            'img' => $img,

        ]);

    }

    public function search(Request $request)
    {
        $time_start = microtime(true);
        $ComputerNo = $request->get('ComputerNo');
        $BarCode = $request->get('BarCode');
        $ModelNo = $request->get('ModelNo');


        $DeptID = $request->get('DeptID');
        $ItemID = $request->get('ItemID');
        $TypeID = $request->get('TypeID');
        $SeasonID = $request->get('SeasonID');
        $FabricID = $request->get('FabricID');
        $CountryID = $request->get('CountryID');
        $BrandID = $request->get('BrandID');
        $ItemYear = $request->get('ItemYear');
        $SizeID = $request->get('SizeID');


        $colors = Colors::all();
        $sizes = Sizes::all();
        $depts = Depts::all();
        $items = Items::all();
        $seasons = Seasons::all();
        $types = Types::all();
        $fabrics = Fabrics::all();
        $countries = Countries::all();
        $brands = Brands::all();
        $years = MTI::select('ItemYear')->groupBy('ItemYear')->get();

        /*if (!$ComputerNo && !$BarCode && !$ModelNo){
            return view('itemsFilter.index',compact([
                'colors',
                'sizes',
                'depts',
                'items',
                'seasons',
                'types',
                'fabrics',
                'countries',
                'brands',
                'years',
            ]));
        }*/

        $mti = null;
            $report = true;
            if (!$request->get('BarCode')){
                $mti = MTI::FilterData($request);

                if (count($mti->get()) > 1){
                    return  redirect()->route('postTable',[
                        'mti' => $mti,
                    ]);

                    return view('itemsFilter.showing', [
                        'MTI' => $mti->paginate(),
                    ]);
                }

                if (count($mti->get()) == 0){
                    return view('itemsFilter.index', [
                        'colors' => $colors,
                        'sizes' => $sizes,
                        'depts' => $depts,
                        'items' => $items,
                        'seasons' => $seasons,
                        'types' => $types,
                        'fabrics' => $fabrics,
                        'countries' => $countries,
                        'brands' => $brands,
                        'years' => $years,
                        'notFound' => true,
                    ]);
                }
            }

            if ($request->get('BarCode')){
                $compNo = MTD::where('BarCode','=',$BarCode)->first()->ComputerNo;
                $ComputerNo = $compNo;
                $mti = MTI::where('ComputerNo','=',$ComputerNo);
            }





            $branches =  DB::table('MTI')
                ->join('MTD', 'MTI.ComputerNo', '=', 'MTD.ComputerNo')
                ->join('MTS', 'MTD.Code', '=', 'MTS.Code')
                ->join('Branches', 'MTS.BranchID', '=', 'Branches.BranchID')
                ->select('Branches.BranchName','Branches.BranchID', DB::raw('Sum(MTS.Qty) As total'))
                ->groupBy(['Branches.BranchName','Branches.BranchID'])->having(DB::raw('Sum(ABS(MTS.Qty))') ,'>',0);

            $join = DB::table('MTI')
                ->join('MTD', 'MTI.ComputerNo', '=', 'MTD.ComputerNo')
                ->join('MTS', 'MTD.Code', '=', 'MTS.Code')
                ->join('Colors', 'MTD.ColorID', '=', 'Colors.ColorID')
                ->join('Sizes', 'MTD.SizeID', '=', 'Sizes.SizeID')
                ->leftJoin('Branches', 'MTS.BranchID', '=', 'Branches.BranchID')->whereIn('Branches.BranchID',$branches->pluck('Branches.BranchID'))
                ->select(
                   // 'MTI.ComputerNo',
                   // 'MTI.ModelNo',
                   // 'MTI.DeptID',
                   // 'MTI.ItemID',
                  //  'MTI.TypeID',
                  //  'MTI.SeasonID',
                  //  'MTI.FabricID',
                   // 'MTI.CountryID',
                   // 'MTI.BrandID',
                   // 'MTI.StandNo',
                    //'MTI.ItemYear',
                  //  'MTI.Des',
                   // 'MTI.EndUser',
                   // 'MTI.Sale',
                  //  'MTI.Special',
                   // 'MTI.Clearance',
                   // 'MTI.MinPrice',
                    'BarCode',
                    'ColorName',
                    'SizeName',
                    'BranchName',
                    'MTS.Qty',
                   DB::raw('Sum(MTS.Qty) As total')
                )
                ->groupBy([
                    //'MTI.ComputerNo',
                    //'MTI.ModelNo',
                    //'MTI.DeptID',
                   // 'MTI.ItemID',
                    //'MTI.TypeID',
                   // 'MTI.SeasonID',
                   // 'MTI.FabricID',
                  //  'MTI.CountryID',
                  //  'MTI.BrandID',
                   // 'MTI.StandNo',
                  //  'MTI.ItemYear',
                   // 'MTI.Des',
                  //  'MTI.EndUser',
                   // 'MTI.Sale',
                    //'MTI.Special',
                    //'MTI.Clearance',
                   // 'MTI.MinPrice',
                    'MTD.BarCode',
                    'Colors.ColorName',
                    'Sizes.SizeName',
                    'Branches.BranchName',
                    'MTS.Qty'
                ]);

            if (isset($mti) && count($mti->get()) === 1){
                $join->where('MTI.ComputerNo', '=', $mti->first()->ComputerNo);
                $branches->where('MTI.ComputerNo', '=', $mti->first()->ComputerNo);
            }
            if ($ComputerNo){
                $join->where('MTI.ComputerNo', '=', $ComputerNo);
                $branches->where('MTI.ComputerNo', '=', $ComputerNo);
            }


            if ($ModelNo){
                $join->where('MTI.ModelNo', '=', $ModelNo);
                $branches->where('MTI.ModelNo', '=', $ModelNo);
            }


            if ($DeptID){
                $join->where('MTI.DeptID', '=', $DeptID);
                $branches->where('MTI.DeptID', '=', $DeptID);
            }


            /*if ($BarCode){
                $join->where('MTD.BarCode', '=', $BarCode);
                $branches->where('MTD.BarCode', '=', $BarCode);
            }*/


            /*$collection = $join->get()->groupBy('BranchName')->map(function ($row) {
                return $row->sum('Qty');
            });*/
            //dd($branches->get());
           // dd($join->get()->groupBy('BarCode'));
            /*dd($join->whereIn('Branches.BranchID',$branches->pluck('Branches.BranchID'))->get()->groupBy('BranchName')->map(function ($row) {
                return $row->sum('Qty');
            }));*/

            $img = 'http://82.137.231.35:100/' . $ComputerNo . '.jpg';
        $mti->first();$join->get()->groupBy('BarCode');$branches->get(); $join->whereIn('Branches.BranchID',$branches->pluck('Branches.BranchID'))->get()->groupBy('BranchName')->map(function ($row) {
        return $row->sum('Qty');
    });


        $time_elapsed_secs = microtime(true) - $time_start;
        dd($time_elapsed_secs);
            return view('itemsFilter.index', [
                'colors' => $colors,
                'sizes' => $sizes,
                'depts' => $depts,
                'items' => $items,
                'seasons' => $seasons,
                'types' => $types,
                'fabrics' => $fabrics,
                'countries' => $countries,
                'brands' => $brands,
                'years' => $years,
                'report' => true,
                 'mti' => $mti->first(),
                'join' => $join->get()->groupBy('BarCode'),
                'branches' => $branches->get(),
                'tot' => $join->whereIn('Branches.BranchID',$branches->pluck('Branches.BranchID'))->get()->groupBy('BranchName')->map(function ($row) {
                    return $row->sum('Qty');
                }),
                'img' => $img,

            ]);



    }


    public function getTable(Request $request){
        $mti = MTI::FilterData($request);
        return view('itemsFilter.showing', [
            'MTI' => $mti->paginate(),
        ]);
    }


}
