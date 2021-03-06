<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Controllers\Schema;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $footballEvents = Event::where('type', 'Football')->get();
        $hockeyEvents = Event::where('type', 'Hockey')->get();
        $cyberEvents = Event::where('type', 'Cybersport')->get();

        return view('events.index', [
            'footballEvents' => $footballEvents,
            'hockeyEvents' => $hockeyEvents,
            'cyberEvents' => $cyberEvents,
        ]);
    }

    public function specialRequirements(Request $request) {

        if($request->filter) {
            if($request->filter === 'predict') {
                $filter = Event::whereRaw([
                    'predict' => ['$gte' => 90, '$lte' => 100],
                ])->get();
            }
            else if($request->filter === 'all') {
                $filter = Event::where('predict', 'exists', true)
                            ->where('title', '!=', null)
                            ->groupBy('predict')
                            ->get(['title', 'commandA', 'commandB', 'predict', 'img_src', 'views']);
            }
        }

        if($request->search) {
            $filter = Event::where('title', 'like', '%'.$request->search.'%')
                            ->orWhere('commandA', 'like', '%'.$request->search.'%')
                            ->orWhere('commandB', 'like', '%'.$request->search.'%')
                            ->get();
        }

        $totalCount = Event::count();
        

        return view('events.special', [
            'filter' => $filter,
            'totalCount' => $totalCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = [
            'Football',
            'Hockey',
            'Cybersport'
        ];
        return view('events.create')->with('types', $types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$event = new Event;

        $title = $request->get('title');
        $commandA = $request->get('commandA');
        $commandB = $request->get('commandB');
        $predict = $request->get('predict');
        $type = $request->get('type');
        $description = $request->get('description');
        $img_src = $request->get('img_src');

        //$event->save;

        Event::create([
            'title' => $title,
            'commandA' => $commandA,
            'commandB' => $commandB,
            'predict' => (int)$predict,
            'description' => $description,
            'type' => $type,
            'img_src' => $img_src
        ]);

        return redirect('/events')->with('message', 'Success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $event = Event::where('_id', $id)->first();

        $event->increment('views');

        return view('events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $types = [
            'Football',
            'Hockey',
            'Cybersport'
        ];

        $event = Event::find($id);
        return view('events.edit', [
            'event' => $event,
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title'=>'required',
            'commandA'=>'required',
            'commandB'=>'required',
            'predict'=>'required',
            'type'=>'required',
            'description'=>'required'
        ]);

        $event = Event::find($id);

        $event->title = $request->get('title');
        $event->commandA = $request->get('commandA');
        $event->commandB = $request->get('commandB');
        $event->predict = $request->get('predict');
        $event->type = $request->get('type');
        $event->description = $request->get('description');
        $event->img_src = $request->get('img_src');
        $event->save();

        return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event = Event::find($id);
        $event->delete();
        return redirect('/events');
    }
}
