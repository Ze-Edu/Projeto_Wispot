<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CrudEvents;
class CalenderController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = CrudEvents::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end','backgroundColor','textColor','descricao']);
            return response()->json($data);
        }
        return view('home');
    }
 
    public function calendarEvents(Request $request)
    {
 
        switch ($request->type) {
           case 'create':
              $event = CrudEvents::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
                  'descricao' => $request->descricao,
              ]);
 
              return response()->json($event);
             break;

           case 'edit':
              $event = CrudEvents::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;

           case 'delete':
              $event = CrudEvents::find($request->id)->delete();

              return response()->json($event);
             break;

           default:
             # ...
             break;
        }
    }
}
