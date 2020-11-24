<?php

namespace App\Http\Controllers;

use App\Repositories\RepairRepository;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * @var RepairRepository
     */
    private RepairRepository $repairRepository;

    /**
     * StatisticsController constructor.
     * @param RepairRepository $repairRepository
     */
    public function __construct(RepairRepository $repairRepository)
    {
        $this->repairRepository = $repairRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('statistics.index');
    }

    /**
     * @param int $offset
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiData($offset = 0)
    {
        $to = Carbon::today()->addDays($offset);
        $from = $to->copy()->subDays(6);

        $chartData = $this->getChartsData($from, $to);

        return response()->json($chartData);
    }

    /**
     * @param CarbonInterface $from
     * @param CarbonInterface $to
     * @return array
     */
    private function getChartsData(CarbonInterface $from, CarbonInterface $to) : array
    {
        $sumData = [];
        $chartData = ['parts' => [], 'repair' => []];
        $repairs = $this->repairRepository->getCreatedBetweenDates($from, $to);

        for($i = $from; $i <= $to; $i = $i->addDay())
            $sumData[$i->format('Y-m-d')] = ['repair' => 0, 'parts' => 0];

        foreach($repairs as $repair){
            $index = $repair->created_at->format('Y-m-d');

            $sumData[$index]['parts'] += $repair->parts_cost;
            $sumData[$index]['repair'] += $repair->repair_cost;
        }

        foreach($sumData as $date => $data){
            $chartData['parts'][] = ['x' => $date, 'y' => $data['parts']];
            $chartData['repair'][] = ['x' => $date, 'y' => $data['repair']];
        }

        return $chartData;
    }
}
