<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepairRequest;
use App\Models\Repair;
use App\Repositories\ContractorRepository;
use App\Repositories\RepairRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    /**
     * @var RepairRepository
     */
    private RepairRepository $repairRepository;
    /**
     * @var ContractorRepository
     */
    private ContractorRepository $contractorRepository;

    /**
     * RepairController constructor.
     * @param RepairRepository $repairRepository
     * @param ContractorRepository $contractorRepository
     */
    public function __construct(
        RepairRepository $repairRepository,
        ContractorRepository $contractorRepository
    )
    {
        $this->repairRepository = $repairRepository;
        $this->contractorRepository = $contractorRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $repairs = $this->repairRepository->index();

        return view('repairs.index', compact('repairs'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $contractors = $this->contractorRepository->all();

        return view('repairs.create', compact('contractors'));
    }

    /**
     * @param RepairRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RepairRequest $request)
    {
        $this->repairRepository->store($request->all());

        return redirect()->route('repairs.index')->with('success', 'Dodano naprawę');
    }

    /**
     * @param Repair $repair
     * @return Application|Factory|View
     */
    public function edit(Repair $repair)
    {
        $contractors = $this->contractorRepository->all();

        return view('repairs.edit', compact('repair', 'contractors'));
    }

    /**
     * @param Repair $repair
     * @param RepairRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Repair $repair, RepairRequest $request)
    {
        $this->repairRepository->update($repair, $request->all());

        return redirect()->route('repairs.index')->with('success', 'Zaktualizowano naprawę');
    }

    /**
     * @param Repair $repair
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Repair $repair)
    {
        $this->repairRepository->destroy($repair);

        return redirect()->route('repairs.index')->with('success', 'Usunięto naprawę');
    }
}
