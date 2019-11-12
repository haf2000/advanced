@extends('layouts.app')

@section('content')
 <!-- <script type="text/javascript">
  $( function(){
          $("#envoyer").click(function(){
            valid = true;
            //---------------------Nom----------------------------
            if( $("#nom").val() == "")
            {  // $("#nom").css("border-color","#ff5b5b");
              $("#nom").next(".error-message").fadeIn().text("Veuillez entrer le nom du Club");
                $("#nom").css("box-shadow","0 0 5px 1px red");
                valid = false;
            }
            else if(! $("#nom").val().match(/^[a-zA-Z ]*$/i)){
          $("#nom").next(".error-message").fadeIn().text("Seules les lettres et les espaces blancs sont autorisés");
              $("#nom").css("box-shadow","0 0 5px 1px red");
              valid = false;
               
            }
            else
            { 
          //   $("#nom").css("border-color","fffff");
              $("#nom").next(".error-message").fadeOut();
              $("#nom").css("box-shadow","");

            }
            //---------------------Prenom----------------------------
            if( $("#prenom").val() == "")
            {  
              $("#prenom").next(".error-message").fadeIn().text("Veuillez entrer le nom du Club");
                $("#prenom").css("box-shadow","0 0 5px 1px red");
                valid = false;
            }
            else if(! $("#prenom").val().match(/^[a-zA-Z ]*$/i)){
          $("#prenom").next(".error-message").fadeIn().text("Seules les lettres et les espaces blancs sont autorisés");
              $("#prenom").css("box-shadow","0 0 5px 1px red");
              valid = false;
               
            }
            else
            { 
          //   $("#nom").css("border-color","fffff");
              $("#nom").next(".error-message").fadeOut();
              $("#nom").css("box-shadow","");

            }
           
           //-------------------------Email-----------------------
                   if( $("#email").val() == "")
            {  
              $("#email").next(".error-message").fadeIn().text("Veuillez entrer votre email");
              $("#email").css("box-shadow","0 0 5px 1px red");
                valid = false;
            }
            else if(! $("#email").val().match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i)){
          $("#email").next(".error-message").fadeIn().text("Veuillez entrer un email valide");
              $("#email").css("box-shadow","0 0 5px 1px red");

              valid = false;
               
            }
            else
            { 
             var res =  $("#email").val().match(/@esi.dz/g);
            
               if (res == null)
               {
              $("#email").next(".error-message").fadeIn().text("Veuillez entrer un email de l'esi");
              $("#email").css("box-shadow","0 0 5px 1px red");
              valid = false;
               }
               else
               {
                $("#email").next(".error-message").fadeOut();
                $("#email").css("box-shadow","");
               }
              
            }

        
            return valid;
          });
                /* ************************************************** Nom ********************************************************** */  
                 $("#nom").keyup(function(){
                   
                    
                        if(! $("#nom").val().match(/^[a-zA-Z ]*$/i)){
                       $("#nom").next(".error-message").show().text("Seules les lettres et les espaces blancs sont autorisés");
                       $("#nom").css("box-shadow","0 0 5px 1px red");
                        }
                      else
                      { 
       
                          $("#nom").next(".error-message").hide().text("");
                          $("#nom").css("box-shadow","");
                      }
                  

                   })
                 /* ************************************************** Nom ********************************************************** */  
                 $("#prenom").keyup(function(){
                   
                    
                        if(! $("#prenom").val().match(/^[a-zA-Z ]*$/i)){
                       $("#prenom").next(".error-message").show().text("Seules les lettres et les espaces blancs sont autorisés");
                       $("#prenom").css("box-shadow","0 0 5px 1px red");
                        }
                      else
                      { 
       
                          $("#prenom").next(".error-message").hide().text("");
                          $("#prenom").css("box-shadow","");
                      }
                  

                   })
               /*   *********************************************** Email ***********************************************************  */
                   $("#email").keyup(function(){
                   if(! $("#email").val().match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i)){
          $("#email").next(".error-message").fadeIn().text("Veuillez entrer un email valide");
          $("#email").css("box-shadow","0 0 5px 1px red");
              valid = false;
               
            }
            else
            { 
             var res =  $("#email").val().match(/@esi.dz/g);
            
               if (res == null)
               {
              $("#email").next(".error-message").fadeIn().text("Veuillez entrer un email de l'esi");
               $("#email").css("box-shadow","0 0 5px 1px red");
              valid = false;
               }
               else
               {
                $("#email").next(".error-message").fadeOut();
              $("#email").css("box-shadow","");

               }
              
            }
                    
                   })


              }); 
     
</script> -->
<!-- ********************************************************************** -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

               

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



<br><br>

             <div class="container">

  <h2 style="text-align: center;">Une réservation simplifiée, pour des évènements de qualité !</h2>
               
<form method="POST" action="/reservation">
    <div class="row">
    <div class="col-md-6">

      <div class="form-group">
          <label for="nom">Nom *</label>
<input type="text" class="form-control" placeholder="Entrer votre nom !" value="" name="nom" id="nom" />  
<span class="error-message text-danger">@if ($errors->has('nom'))
<div class="error">{{ $errors->first('nom') }}</div>
@endif</span></div> 


<div class="form-group">
          <label for="prenom">Prénom *</label>
<input type="text" class="form-control" placeholder="Entrer votre prénom !" value="" name="prenom" id="prenom" />
<span class="error-message text-danger">@if ($errors->has('prenom'))
<div class="error">{{ $errors->first('prenom') }}</div>
@endif</span>
</div>

<div class="form-group"><label for="email">Email *</label>
  <input type="email" class="form-control" placeholder="Entrer votre email !" value="" name="email" id="email" /> <span class="error-message text-danger">@if ($errors->has('email'))
<div class="error">{{ $errors->first('email') }}</div>
@endif</span></div> 
  <div class="form-group">
         <label for="desc">Description *</label>
<input type="textarea" class="form-control" placeholder="Décrire l'évènement !" value="" name="desc" id="desc" /><span class="error-message text-danger">@if ($errors->has('desc'))
<div class="error">{{ $errors->first('desc') }}</div>
@endif</span></div> 


</div>
<!--------------------------------------------------------- -->
    <div class="col-md-6">
      
      <div class="form-group">
    <label for="date" >Date *</label>
              <input  type="date" class="form-control input-group date" name="date" value="<?php if (isset($_POST['date'])){echo $_POST['date'];} ?>">
<span class="error-message text-danger">@if ($errors->has('date'))
<div class="error">{{ $errors->first('date') }}</div>
@endif</span>
         </div>

  <div class="form-group">
<label for="deb">Heure de début *</label>
              <input type="time" name="deb" class="input-group"><span class="error-message text-danger">@if ($errors->has('deb'))
<div class="error">{{ $errors->first('deb') }}</div>
@endif</span>
            </div>
    

        
  <div class="form-group">
              <label for="fin">Heure de fin *</label>
              <input type="time" name="fin" class="input-group"><span class="error-message text-danger">@if ($errors->has('fin'))
<div class="error">{{ $errors->first('fin') }}</div>
@endif</span>
   </div>
   
      <div class="form-group">
          <label for="evnt">Nom de l'évènement *</label>
<input type="textarea" class="form-control" placeholder="Entrer le nom de l'évènement !" value="" name="evnt" id="desc" /><span class="error-message text-danger">@if ($errors->has('evnt'))
<div class="error">{{ $errors->first('evnt') }}</div>
@endif</span>
 
    </div>
 </div>
</div>
<!--------------------------------------------------------- -->
 <div class="row"> <div class="col-md-8">     <input type="submit" class="btn btn-info"  value="Envoyer" id="envoyer" /></div>
</div>
       

    
{{ csrf_field() }}
</form><br>
<!--
 <div class="row">
 
@if(count($errors) >0)
      <div class="alert alert-danger" style="size: 300px;">
   @foreach($errors->all() as $error)
        <ul>
          <li>{{$error}}</li>
        </ul>
        
     
    @endforeach
     </div>
@endif  
     </div>        
-->
</div>















        </div>
    </div>
</div>
@endsection
