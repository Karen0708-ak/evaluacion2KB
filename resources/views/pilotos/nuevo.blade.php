@extends('layout.app')

@section('contenido')
<h1 class="text-white" >Registrar nuevo Piloto</h1>
<div clas='row'>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="{{ route('pilotos.store') }}"  method="POST">
            @csrf
            <label for=""><b>Cedula:</b></label>
            <input type="text" name="cedula" id="cedula" placeholder="Ingrese su numero de cédula" required class="form-control">
            <br>
            <label for=""><b>Nombre:</b></label>
            <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" required class="form-control" >
            <br>
            
            <div class="row">
                <div class="col-md-5">
                    <label for=""><b>COORDENADA N°1</b></label><br><br>
                    <label for=""><b>Latitud</b></label><br>
                    <input type="number" name="latitud1" id="latitud1" class="form-control" readonly placeholder="Seleccione la latitud en el mapa">
                    <label for=""><b>Longitud</b></label><br>
                    <input type="number" name="longitud1" id="longitud1" class="form-control" readonly placeholder="Seleccione la longitud en el mapa">
                    <label for=""><b>Hora</b></label><br>
                    <input type="time" name="hora1" id="hora1" class="form-control" placeholder="Ingrese la hora">
                    <br>
                </div>
                <div class="col-md-7">
                <br>
                    <div class="" id="mapa1" style="border:2px solid white; height:200px;width:100%"> </div>

                </div>
            </div>  
            <div class="row">
                <div class="col-md-5">
                    <label for=""><b>COORDENADA N°2</b></label><br><br>
                    <label for=""><b>Latitud</b></label><br>
                    <input type="number" name="latitud2" id="latitud2" class="form-control" readonly placeholder="Seleccione la latitud en el mapa">
                    <label for=""><b>Longitud</b></label><br>
                    <input type="number" name="longitud2" id="longitud2" class="form-control" readonly placeholder="Seleccione la longitud en el mapa">
                    <label for=""><b>Hora</b></label><br>
                    <input type="time" name="hora2" id="hora2" class="form-control" placeholder="Ingrese la hora">
                    <br>
                </div>
                <div class="col-md-7">
                <br>
                    <div class="" id="mapa2" style="border:2px solid white; height:200px;width:100%"> </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label for=""><b>COORDENADA N°3</b></label><br><br>
                    <label for=""><b>Latitud</b></label><br>
                    <input type="number" name="latitud3" id="latitud3" class="form-control" readonly placeholder="Seleccione la latitud en el mapa">
                    <label for=""><b>Longitud</b></label><br>
                    <input type="number" name="longitud3" id="longitud3" class="form-control" readonly placeholder="Seleccione la longitud en el mapa">
                    <label for=""><b>Hora</b></label><br>
                    <input type="time" name="hora3" id="hora3" class="form-control" placeholder="Ingrese la hora">
                    <br>
                </div>
                <div class="col-md-7">
                <br>
                    <div class="" id="mapa3" style="border:2px solid white; height:200px;width:100%"> </div>

                </div>
            </div>
            <br>
            <center>
                <button class="btn btn-success">
                    Guardar
                </button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('pilotos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger">
                    Limpiar
                </button>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-primary" onclick="graficarPredio();">
                    Graficar Predio
                </button>
            </center>
        </form>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div id="mapa-poligono" style="height: 500px; width:100%; border:2px solid blue;"></div>
    </div>
</div>
<script type="text/javascript">
    var mapaPoligono;

    window.initMap = function () {
        var latitud_longitud = new google.maps.LatLng(-0.9374805, -78.6161327);

        // COORDENADA 1
        var mapa1 = new google.maps.Map(document.getElementById('mapa1'), {
            center: latitud_longitud,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var marcador1 = new google.maps.Marker({
            position: latitud_longitud,
            map: mapa1,
            title: "Seleccione la coordenada 1",
            draggable: true
        });
        google.maps.event.addListener(marcador1, 'dragend', function (event) {
            document.getElementById("latitud1").value = this.getPosition().lat();
            document.getElementById("longitud1").value = this.getPosition().lng();
        });

        // COORDENADA 2
        var mapa2 = new google.maps.Map(document.getElementById('mapa2'), {
            center: latitud_longitud,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var marcador2 = new google.maps.Marker({
            position: latitud_longitud,
            map: mapa2,
            title: "Seleccione la coordenada 2",
            draggable: true
        });
        google.maps.event.addListener(marcador2, 'dragend', function (event) {
            document.getElementById("latitud2").value = this.getPosition().lat();
            document.getElementById("longitud2").value = this.getPosition().lng();
        });

        // COORDENADA 3
        var mapa3 = new google.maps.Map(document.getElementById('mapa3'), {
            center: latitud_longitud,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var marcador3 = new google.maps.Marker({
            position: latitud_longitud,
            map: mapa3,
            title: "Seleccione la coordenada 3",
            draggable: true
        });
        google.maps.event.addListener(marcador3, 'dragend', function (event) {
            document.getElementById("latitud3").value = this.getPosition().lat();
            document.getElementById("longitud3").value = this.getPosition().lng();
        });

        mapaPoligono = new google.maps.Map(document.getElementById("mapa-poligono"), {
            zoom: 15,
            center: latitud_longitud,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    };

    function graficarPredio() {
        var coordenada1 = new google.maps.LatLng(
            document.getElementById('latitud1').value,
            document.getElementById('longitud1').value
        );
        var coordenada2 = new google.maps.LatLng(
            document.getElementById('latitud2').value,
            document.getElementById('longitud2').value
        );
        var coordenada3 = new google.maps.LatLng(
            document.getElementById('latitud3').value,
            document.getElementById('longitud3').value
        );

        var coordenadas = [coordenada1, coordenada2, coordenada3];

        var poligono = new google.maps.Polygon({
            paths: coordenadas,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#00FF00",
            fillOpacity: 0.35,
        });

        poligono.setMap(mapaPoligono);
    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV-hhnGIiWpn19hxGsr3NpUv7yFXaqFCU&callback=initMap">
</script>

@endsection