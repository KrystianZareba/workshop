<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Contractor;
use App\Repositories\BrandRepository;
use App\Repositories\CarRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CarController extends Controller
{
    /**
     * @var CarRepository
     */
    private CarRepository $carRepository;
    /**
     * @var BrandRepository
     */
    private BrandRepository $brandRepository;

    /**
     * CarController constructor.
     * @param CarRepository $carRepository
     * @param BrandRepository $brandRepository
     */
    public function __construct(
        CarRepository $carRepository,
        BrandRepository $brandRepository
    )
    {
        $this->carRepository = $carRepository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * @param Contractor $contractor
     * @return Application|Factory|View
     */
    public function create(Contractor $contractor)
    {
        $brands = $this->brandRepository->all()->pluck('name', 'id');

        return view('cars.create', compact('contractor', 'brands'));
    }

    /**
     * @param Contractor $contractor
     * @param CarRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Contractor $contractor, CarRequest $request)
    {
        $this->carRepository->store($request->all());

        return redirect()->route('contractors.show', $contractor)->with('success', 'Dodano pojazd do kontrahenta');
    }

    /**
     * @param Contractor $contractor
     * @param Car $car
     * @return Application|Factory|View
     */
    public function edit(Contractor $contractor, Car $car)
    {
        $brands = $this->brandRepository->all()->pluck('name', 'id');

        return view('cars.edit', compact('contractor', 'brands', 'car'));
    }

    /**
     * @param Contractor $contractor
     * @param Car $car
     * @param CarRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Contractor $contractor, Car $car, CarRequest $request)
    {
        $this->carRepository->update($car, $request->all());

        return redirect()->route('contractors.show', $contractor)->with('success', 'Zaktualizowano pojazd dla kontrahenta');
    }

    /**
     * @param Contractor $contractor
     * @param Car $car
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contractor $contractor, Car $car)
    {
        $this->carRepository->destroy($car);

        return redirect()->route('contractors.show', $contractor)->with('success', 'Usunięto pojazd kontrahenta');
    }
}
