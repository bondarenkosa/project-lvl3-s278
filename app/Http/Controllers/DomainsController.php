<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;

class DomainsController extends Controller
{
    public function show($id)
    {
        $domain = Domain::findOrFail($id);

        return view('domains.show', ['domain' => $domain]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);
        $domain = Domain::create($request->all());

        return redirect()
            ->route("domains.show", ["id" => $domain->id]);
    }
}
