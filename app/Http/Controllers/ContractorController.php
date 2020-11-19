<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractorRequest;
use App\Models\Contractor;
use App\Repositories\ContractorRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ContractorController extends Controller
{
    /**
     * @var ContractorRepository
     */
    private $contractorRepository;

    /**
     * ContractorController constructor.
     * @param ContractorRepository $contractorRepository
     */
    public function __construct(ContractorRepository $contractorRepository)
    {
        $this->contractorRepository = $contractorRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $contractors = $this->contractorRepository->index();

        return view('contractors.index', compact('contractors'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('contractors.create');
    }

    /**
     * @param ContractorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContractorRequest $request)
    {
        $this->contractorRepository->store($request->all());

        return redirect()->route('contractors.index')->with('success', 'Dodano kontrahenta');
    }

    /**
     * @param Contractor $contractor
     * @return Application|Factory|View
     */
    public function show(Contractor $contractor)
    {
        return view('contractors.show', compact('contractor'));
    }

    /**
     * @param Contractor $contractor
     * @param ContractorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Contractor $contractor, ContractorRequest $request)
    {
        $this->contractorRepository->update($contractor, $request->all());

        return redirect()->route('contractors.index')->with('success', 'Zaktualizowano kontrahenta');;
    }

    /**
     * @param Contractor $contractor
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contractor $contractor)
    {
        $this->contractorRepository->destroyWithCars($contractor);

        return redirect()->route('contractors.index')->with('success', 'Usunięto kontrahenta wraz z pojazdami');
    }
}
