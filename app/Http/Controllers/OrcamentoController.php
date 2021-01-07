<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrcamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        $orcamentos = Orcamento::latest()->paginate(5);
        $i = ($request->input('page', 1) - 1) * 5;
        $data = [
            'orcamentos' => $orcamentos,
            'i' => $i,
        ];
        return view('orcamentos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('orcamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //        $request->validate([
        //            'name' => 'required',
        //            'introduction' => 'required',
        //            'location' => 'required',
        //            'cost' => 'required'
        //        ]);

        Orcamento::create($request->all());

        return redirect()->route('orcamentos.index')
            ->with('success', 'Orçamento criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param Orcamento $orcamento
     *
     * @return Response
     */
    public function show(Orcamento $orcamento)
    {
        return $orcamento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Orcamento $orcamento
     *
     * @return Response
     */
    public function edit(Orcamento $orcamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Orcamento $orcamento
     *
     * @return Response
     */
    public function update(Request $request, Orcamento $orcamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Orcamento $orcamento
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Orcamento $orcamento): RedirectResponse
    {
        $orcamento->delete();

        return redirect()
            ->route('orcamentos.index')
            ->with('success', 'O orçamento foi deletado com sucesso');
    }
}
