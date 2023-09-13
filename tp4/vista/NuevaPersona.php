<!DOCTYPE html>
<html>
<head>
    <title>Nueva Persona</title>
    
</head>
<body>
    <?php
    ?>


    <h1>Agregar una nueva persona</h1>

    <form action="./accion/accionNuevaPersona.php" method="post">
        <label for="dni">Número de documento:</label>
        <input type="text" id="nroDni" name="nroDni" required>
        <p id="pDni"></p>

        <br>
        <label for="apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido" required>
        <p id="pApellido"></p>

        <br>
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required>
        <p id="pNombre"></p>

        <br>
        <label for="fechaNac">Fecha de Nacimiento: </label>
        <input type="text" id="fechaNac" name="fechaNac" required>
        <p id="pFechaNac"></p>

        <br>
        <label for="telefono">Telefono: </label>
        <input type="text" id="telefono" name="telefono" required>
        <p id="pTelefono"></p>

        <br>
        <label for="domicilio">Domicilio: </label>
        <input type="text" id="domicilio" name="domicilio" required>
        <p id="pDomicilio"></p>


        <input type="submit" onclick="verificar();" value="Agregar">
    </form>
    
</body>
<script>

   function verificar(){
        let resp = true;

        let dni = parseInt(document.getElementById('nroDni').value);
        let apellido = document.getElementById('apellido').value;
        let nombre = document.getElementById('nombre').value;
        let fechaNac = document.getElementById('fechaNac').value;
        let telefono = parseInt(document.getElementById('telefono').value);
        let domicilio = document.getElementById('domicilio').value;

        if(isNaN(dni)){
            document.getElementById('nroDni').style.border = "1px solid red";
            document.getElementById('pDni').style.color = "red"
            document.getElementById('pDni').innerHTML = 'Ingrese un DNI valido';
            event.preventDefault();
            resp = false;
        }else{
            document.getElementById('nroDni').style.border = "1px solid green"
        }

        if(apellido == ""){
            document.getElementById('apellido').style.border = "1px solid red";
            document.getElementById('pApellido').style.color = "red"
            document.getElementById('pApellido').innerHTML = 'Ingrese un apellido';
            event.preventDefault();
            resp = false;
        }else{
            document.getElementById('apellido').style.border = "1px solid green"
        }

        if(nombre == ""){
            document.getElementById('nombre').style.border = "1px solid red";
            document.getElementById('pNombre').style.color = "red"
            document.getElementById('pNombre').innerHTML = 'Ingrese un nombre';
            event.preventDefault();
            resp = false;
        }else{
            document.getElementById('nombre').style.border = "1px solid green"
        }
        
        if(isNaN(telefono)){
            document.getElementById('telefono').style.border = "1px solid red";
            document.getElementById('pTelefono').style.color = "red"
            document.getElementById('pTelefono').innerHTML = 'Ingrese numero de telefono';
            event.preventDefault();
            resp = false;
        }else{
            document.getElementById('telefono').style.border = "1px solid green"
        }

        if(domicilio == ""){
            document.getElementById('domicilio').style.border = "1px solid red";
            document.getElementById('pDomicilio').style.color = "red"
            document.getElementById('pDomicilio').innerHTML = 'Ingrese un domicilio';
            event.preventDefault();
            resp = false;
        }else{
            document.getElementById('domicilio').style.border = "1px solid green"
        }

        if (!validarFecha(fechaNac)) {
            document.getElementById('fechaNac').style.border = "1px solid red";
            document.getElementById('pFechaNac').style.color = "red"
            document.getElementById('pFechaNac').innerHTML = 'Ingrese una fecha valida';
            event.preventDefault();
            resp = false;
        }else{
            document.getElementById('fechaNac').style.border = "1px solid green"
        }

        return resp
    }

    function validarFecha(fecha) {
    var partes = fecha.split("/");
    if (partes.length !== 3) {
        return false; // No tiene el formato esperado (deben haber tres partes separadas por "/")
    }

    var dia = parseInt(partes[0], 10);
    var mes = parseInt(partes[1], 10);
    var año = parseInt(partes[2], 10);

    // Verificar si es una fecha válida
    var fechaValida = new Date(año, mes - 1, dia); // Restar 1 al mes (enero es 0)

    return (
        dia === fechaValida.getDate() &&
        mes - 1 === fechaValida.getMonth() &&
        año === fechaValida.getFullYear()
    );
}

    
</script>
</html>