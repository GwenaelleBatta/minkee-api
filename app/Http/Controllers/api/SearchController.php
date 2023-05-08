<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FabricResource;
use App\Http\Resources\GlossaryResource;
use App\Http\Resources\GradationResource;
use App\Http\Resources\PlanResource;
use App\Http\Resources\UserResource;
use App\Models\Fabric;
use App\Models\Glossary;
use App\Models\Gradation;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    private array $results = [];

    public function index(Request $request)
    {
        $searchTerm = request()->input('search') ?? '';
        if ($searchTerm) {
            $this->plans($searchTerm);
            $this->users($searchTerm);
            $this->glossaries($searchTerm);
            $this->tissus($searchTerm);
            $this->gradations($searchTerm);


        } //OK
        $results = $this->results;

        $total = 0;

        if (count($results) > 0) {
            foreach ($results as $result) {
                $total += count($result);
            }
        }
        return response()->json([
            'glossaire' => $results['glossary'],
            'tissus' => $results['fabric'],
            'gradations' => $results['gradations'],
            'users' => $results['users'],
            'plans' => $results['plans']
        ]);
    }

    private function glossaries(string $searchTerm): void
    {
        $searchTerm = request()->input('search') ?? '';
        if ($searchTerm) {
            $references = Glossary::query()
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%');
                })->get();
            $this->results['glossary'] = GlossaryResource::collection($references);
        }
    }

    private function tissus(string $searchTerm): void
    {
        $searchTerm = request()->input('search') ?? '';
        if ($searchTerm) {
            $references = Fabric::query()
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%')
                        ->orWhereJsonContains('use', $searchTerm);
                })->get();
            $this->results['fabric'] = FabricResource::collection($references);
        }
    }

    private function gradations(string $searchTerm): void
    {
        $searchTerm = request()->input('search') ?? '';
        if ($searchTerm) {
            $references = Gradation::query()
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('base', 'like', '%' . $searchTerm . '%');
                })->get();
            $this->results['gradations'] = GradationResource::collection($references);
        }
    }

    private function users(string $searchTerm): void
    {
        $searchTerm = request()->input('search') ?? '';
        if ($searchTerm) {
            $references = User::query()
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%')
                        ->orWhere('email', 'like', '%' . $searchTerm . '%');
                })->get();
            $this->results['users'] = UserResource::collection($references);
        }
    }

    private function plans(string $searchTerm): void
    {
        $searchTerm = request()->input('search') ?? '';
        if ($searchTerm) {
            $references = Plan::query()
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('gender', 'like', '%' . $searchTerm . '%')
                        ->orWhere('type', 'like', '%' . $searchTerm . '%')
                        ->orWhere('base', 'like', '%' . $searchTerm . '%')
                        ->orWhereJsonContains('keywords', $searchTerm)
                        ->orWhereJsonContains('supplies', $searchTerm);
                })->get();
            $this->results['plans'] = PlanResource::collection($references);
        }
    }


}
