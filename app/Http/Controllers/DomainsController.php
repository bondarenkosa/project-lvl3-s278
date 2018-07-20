<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DomainsController extends Controller
{
    public function index()
    {
        $perPage = 5;
        $domains = Domain::paginate($perPage);

        return view('domains.index', ['domains' => $domains]);
    }

    public function show($id)
    {
        $domain = Domain::findOrFail($id);

        return view('domains.show', ['domain' => $domain]);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, ['name' => 'required|url']);
        } catch (ValidationException $e) {
            abort(422, $e->getMessage());
        }

        $domain = Domain::create($request->all());

        return redirect()
            ->route("domains.show", ["id" => $domain->id]);
    }
}
