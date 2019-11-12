<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\res_eff;
use App\User;
use App\Mail\res_acc;
use App\Mail\res_ref;
use App\Notifications\reservation_notification;
class ReservationsController extends Controller
{
    
    public function index()
    {

                $reservations = reservation::all();  
               return view('home')->with('reservations',$reservations);   

   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             return view('reserver');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'nom' => 'required',
        'prenom' => 'required',
         'date'      => 'required|date|date_format:Y-m-d|after:today',
            'deb' => 'required|date_format:H:i',
        'fin' => 'required|date_format:H:i|after:deb',
        'desc' => 'required',
        'evnt' => 'required',
         'email' => 'required|email'
        ]);
        //-------Create post
       $res = new reservation();
        $res->prenom = $request->input('prenom'); // prenom
        $res->nom = $request->input('nom'); // nom
         $email= $request->input('email'); //email
         $res->email  =$email;
         $res->description  = $request->input('desc'); //description
         $res->date  = $request->input('date'); //date
         $res->nom_event  = $request->input('evnt'); // event 
         $res->heure_debut  = $request->input('deb'); // heure debut
         $res->heure_fin  = $request->input('fin'); // heure fin
         //---------------------------
       $data = array('nom' => $res->nom 
        , 'prenom' => $res->prenom ,
          'email' => $email,
           'desc' => $res->description,
           'evnt' => $res->nom_event,
           'deb' => $res->heure_debut,
           'fin' => $res->heure_fin,
           'date' => $res->date
     );
       //-----------------------------
               $res->save();

             //  User::first()->notify(new reservation_notification());

                $reservations = reservation::all();  
                      Mail::to($email)->send(new res_eff($data));
               return view('home')->with('reservations',$reservations);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $res =reservation::find($id);
        $res->acceptee ='1';
        $res->save();
         $reservations = reservation::all();

  $data = array('nom' => $res->nom 
        , 'prenom' => $res->prenom ,
          'email' => $res->email,
           'desc' => $res->description,
           'evnt' => $res->nom_event,
           'deb' => $res->heure_debut,
           'fin' => $res->heure_fin,
           'date' => $res->date
     );
                Mail::to($res->email)->send(new res_acc($data));
               return view('home')->with('reservations',$reservations);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

   $res =reservation::find($id);
        $res->refusee ='1';
        $res->save();
          $reservations = reservation::all();

  $data = array('nom' => $res->nom 
        , 'prenom' => $res->prenom ,
          'email' => $res->email,
           'desc' => $res->description,
           'evnt' => $res->nom_event,
           'deb' => $res->heure_debut,
           'fin' => $res->heure_fin,
           'date' => $res->date
     );
                  Mail::to($res->email)->send(new res_ref($data));

               return view('home')->with('reservations',$reservations);

    }

    public function statis(){
      $reservations = reservation::all()->where('acceptee','=','1');  
      $nbr = count($reservations);
      $data = ['nombre' => $nbr , 'reservations'=> $reservations];
      return view('stat.acceptes')->with('data',$data);
    }


    public function statis_refusee(){
      $reservations = reservation::all()->where('refusee','=','1');  
      $nbr = count($reservations);
      $data = ['nombre' => $nbr , 'reservations'=> $reservations];
      return view('stat.refusees')->with('data',$data);
    }
}
