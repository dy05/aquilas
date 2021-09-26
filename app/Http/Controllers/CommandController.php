<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\produit;
use App\Models\Command;
use App\Models\materielle;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    public function index()
    {
        $commands = Command::all()->where('active', true);

        return view('commands.index', compact('commands'));
    }

    public function create()
    {
        $prs= Product::all()->where('active', true);
        $cls= client::all()->where('active', true);

        return view('commands.create', compact('cls', 'prs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produit' => 'required',
            'idClient' => 'required',
        ]);

        $tes = array_filter($request->dimention, function ($v) {
            return !is_null($v) && $v!=='';
        });

        $command = new Command();
        $command->numero_bon_Command = time();
        $command->date = now();
        $command->product_id = $request->product_id;
        $command->idClient = $request->idClient;
        $command->produit = $request->produit;
        $command->dimention = $tes;
        $command->save();
        //    Command::create($request->all());

        return redirect()->route('commands.index')
            ->with('success', ' created successfully.');
    }

    public function show($id)
    {
        $mats = materielle::all()->where('active', true);
        $command = Command::find($id);

        return view('commands.show', compact('command', 'mats'));
    }

    public function edit($id)
    {
        $command = Command::find($id);
        $pr = Product::find($command->product_id);
        $prs = Product::all();
        $cl = client::find($command->product_id);
        $cls = client::all();

        return view('commands.edit', compact('command', 'pr', 'prs', 'cl', 'cls'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'produit' => 'required',
            'idClient' => 'required',
        ]);

        $command = Command::find($request->id);
        $command->numero_bon_commande = time();
        $command->date = now();
        $command->product_id = $request->product_id;
        $command->idClient = $request->idClient;
        // a verifier
        $command->produit = $request->produit;

        $command->save();

        return redirect()->route('commands.index')->with('success', 'Post updated successfully');
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $command = Command::find($id);
        try {
            $command->delete();
            return redirect()->route('commands.index')->with('success', 'Post deleted successfully');
        } catch (Exception $e) {
            throw new Exception('Unexpected error: ' . $e->getMessage());
        }
    }

    public function termine($id)
    {
        $command = Command::find($id);
        $command->termine = 1;
        $command->save();
        return redirect()->route('commands.index')->with('success', 'termine');
    }
}
