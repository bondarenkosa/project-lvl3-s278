<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator;
use GuzzleHttp\Client;

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
        $data['name'] = $request->input('name');
        $validator = Validator::make($request->all(), ['name' => 'required|url']);
        if ($validator->fails()) {
            $data['errors'] = $validator->errors()->all();
            return response(view('pages.index', $data), 422);
        }

        $client = new Client(['timeout'  => 10.0]);
        try {
            $res = $client->get($data['name']);
        } catch (\Exception $e) {
            $data['errors'] = [$e->getMessage()];
            return response(view('pages.index', $data), 422);
        }

        $domain = new Domain;
        $domain->name = $data['name'];
        $domain->status_code = $res->getStatusCode();
        $domain->content_length = $res->hasHeader('content-length') ? $res->getHeader('content-length')[0] : null;
        $domain->body = $res->getBody()->getContents();

        $domain->save();
        
        return redirect()
            ->route("domains.show", ["id" => $domain->id]);
    }
}
