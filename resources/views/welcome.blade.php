<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>


        <title>Laravel</title>

        <div class="row">
            <div class="col-md-3">
            </div>
        <div class="col-md-6">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/NMre6IAAAiU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>

      <form>
          <div class = "form-group" > 
                <label> pregunta: </label>
                <input type="text" name="question" id="question">
          </div>
         <div class = "form-group" > 
                <button class = "btn btn-success btn-submit" > Enviar </button> 
            </div>
      </form>

    <div id='myWatch'></div>
    


<script type="text/javascript">


    function getTimeAJAX() {

        //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    
        var time = $.ajax({
            url: '/GetQuestion', //indicamos la ruta donde se genera la hora
                dataType: 'text',//indicamos que es de tipo texto plano
                async: false     //ponemos el parámetro asyn a falso
        }).responseText;

        var innerEdit = '';
        var reg = JSON.parse(time);
        reg.forEach(function(entry) {
            innerEdit = innerEdit+"<tr><td>"+entry.user_id+"</td><td>"+entry.question+"</td></tr>";
        });

       // console.log('registros' , reg);

        document.getElementById("myWatch").innerHTML ="<table><thead><tr><th>usuario<th><th>pregunta<th></tr></thead><tbody>"+innerEdit+"</tbody></table>"; 
      //  document.getElementById("myWatch").innerHTML = "La fecha que hemos obtenido de time.php vía AJAX es: "+time;
    }

   setInterval(getTimeAJAX,3000);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn-submit").click(function(e){
        e.preventDefault();

        var question = $("input[name=question]").val();

        $.ajax({
           type:'POST',
           url:"{{ route('storeQuestion') }}",
           data:{question:question},
           success:function(data){
              $("question").val("");
              alert('pregunta agregada correctamente');
           }
        });

  

    });

</script>
    </body>
    </body>
</html>
