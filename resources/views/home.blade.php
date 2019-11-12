@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
               

               
                               @if (Auth::check())

<table class="table table-striped table-bordered" id="table_id">
                            <thead ><tr>
                                <th colspan="10" style="text-align: center;"> Liste des réservations en attente:</th>
                            </tr><tr>
                              <td>
                               <span>ID</span>
                                </td>
                              <td>
                               <span>Nom</span>
                                </td>
                                <td>
                               <span>Prénom</span>
                                </td><td>
                               <span>Date</span>
                                </td><td>
                               <span>Heure Début</span>
                                </td>
                                <td>
                               <span>Heure fin</span>
                                </td>
                                <td>
                               <span>Nom de l'évènement</span>
                                </td>
                                <td>
                               <span>Description</span>
                                </td>
                                <td>
                               <span>Refuser</span>
                                </td><td>
                               <span>Accepter</span>
                                </td>
                            </tr>
                        </thead> 

  
                
                          
                        
                        <tbody>@foreach($reservations as $reservation)
                          @if($reservation->refusee == '0' && $reservation->acceptee == '0' )
                              <tr>
                                <td>
                               {{ $reservation->id}}
                                </td>
                               <td>
                               {{ $reservation->nom}}
                                </td>
                                <td>
                              {{ $reservation->prenom}}
                                </td>
                                <td>
                               {{ $reservation->date}}
                                </td>
                                <td>
                               {{ $reservation->heure_debut}}
                                </td>
                                <td>
                               {{ $reservation->heure_fin}}
                                </td>
                                <td>
                               {{ $reservation->nom_event}}
                                </td>
                                <td>
                               {{ $reservation->description}}
                                </td>
                                
                                <td>
                         <form action="/reservation/{{$reservation->id}}" method="post">
                                <button type="submit" name="refuser" class="btn btn-danger">Refuser </button>
                                   {{ method_field('DELETE') }}
                                      {{ csrf_field() }}
                            </form> 
                                
                                </td>
                                <td>
                                 <form action="/reservation/{{$reservation->id}}/edit" method="post">
                                <button type="submit" name="accepter" class="btn btn-success">Accepter</button>
                                 {{ method_field('GET') }}
                                 {{ csrf_field() }}
                            </form>  
                                </td>
                               
                            </tr>
                            
                            
                          @endif
                            
                        @endforeach</tbody>

                        </table>


                            @else
                            <h4 class="jumbotron" style="align-content: center;">Bienvenue sur notre application </h4>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
