<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        return view('equipments.index', [
            'equipments' => Equipment::all(),
        ]);
    }

    public function create()
    {
        return view('equipments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        if ($request->file('photo')) {
            $photo=$request->file('photo');
            //
            $photoName=time().'.'.$photo->extension();
            $photo->move(public_path('img'), $photoName);

            //  dd($photo);

            $nom = $request->nom;
            $color=$request->color;
            $marque=$request->marque;
            $date=$request->date;
            $detail=$request->details;

            $equipment= new Equipment();
            $equipment->nom=$nom;
            $equipment->color=$color;
            $equipment->marque=$marque;
            $equipment->date=$date;
            $equipment->detail=$detail;
            $equipment->photo=$photoName;
            $equipment->save();

            //    equipment::create($request->all());

            return redirect()->route('equipments.index')
                ->with('success', ' created successfully.');
        } else {
            $nom=$request->nom;
            $color=$request->color;
            $marque=$request->marque;
            $date=$request->date;
            $detail=$request->details;

            $equipment= new Equipment();
            $equipment->nom=$nom;
            $equipment->color=$color;
            $equipment->marque=$marque;
            $equipment->date=$date;
            $equipment->detail=$detail;
            $equipment->photo="a.png";
            $equipment->save();

            //    equipment::create($request->all());

            return redirect()->route('equipments.index')
                ->with('success', ' created successfully.');
        }
    }

    public function show(Equipment $equipment)
    {
        return view('equipments.show', compact('equipment'));
    }

    public function edit(Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        if ($request->file('photo')) {
            $photo=$request->file('photo');
            //
            $photoName=time().'.'.$photo->extension();
            $photo->move(public_path('img'), $photoName);

            //  dd($photo);

            $nom=$request->nom;
            $color=$request->color;
            $marque=$request->marque;
            $date=$request->date;
            $detail=$request->details;

            $equipment= Equipment::find($request->id);
            $equipment->nom=$nom;
            $equipment->color=$color;
            $equipment->marque=$marque;
            $equipment->date=$date;
            $equipment->detail=$detail;
            $equipment->photo=$photoName;
            $equipment->save();

            //    equipment::create($request->all());

            return redirect()->route('equipments.index')
                ->with('success', 'Post updated successfully');
        } else {
            $nom=$request->nom;
            $color=$request->color;
            $marque=$request->marque;
            $date=$request->date;
            $detail=$request->details;

            $equipment=  Equipment::find($request->id);
            $equipment->nom=$nom;
            $equipment->color=$color;
            $equipment->marque=$marque;
            $equipment->date=$date;
            $equipment->detail=$detail;
            //  $equipment->photo="a.png";
            $equipment->save();

            //    equipment::create($request->all());

            return redirect()->route('equipments.index')
                ->with('success', 'Post updated successfully');
        }
    }

    /**
     * @param Equipment $equipment
     * @return RedirectResponse
     */
    public function destroy(Equipment $equipment): RedirectResponse
    {
        if ($equipment->delete()) {
            return redirect()->route('equipments.index')
                ->with('success', 'Post deleted successfully');
        }

        return redirect()->route('equipments.index')
            ->with('error', 'Error while deleting');
    }
}
