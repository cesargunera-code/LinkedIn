function validarCampoVacio(id) {
    let campo = document.getElementById(id);
    if (campo.value == '') {
        campo.classList.remove('input-success');
        campo.classList.add('input-error');
    }else{
        campo.classList.remove('input-error');
        campo.classList.add('input-success');
    }
}
    
function login() {
    axios({
        url: "../backend/api/login.php", 
        method: "post",
        responseType: "json",
        data: {
            correo: document.getElementById('correo').value,
            contraseña: document.getElementById('contraseña').value
        }
    }).then(res => {
        if (res.data.codigoResultado == 1) {   //si el data al ingresar email y correo da codigoResultado = 1 nos redirecciona a otra pagina
            window.location.href = "linkedin.php";
        }else{
            document.getElementById('error').style.display = 'block';   //sino, enviamos el mensaje qe viene desde el servidor.
            document.getElementById('error').innerHTML = res.data.mensaje;
        }
        console.log(res);
    }).catch(error => {
        console.error(error);
    });

    validarCampoVacio('correo');
    validarCampoVacio('contraseña');
}

function guardarUsuario() {
    axios({
        url: "../backend/api/usuarios.php",
        method: "post",
        responseType: "json",
        data: {
            codigoUsuario: 9,
            nombre: document.getElementById('nombre').value,
            apellido: document.getElementById('apellido').value,
            correo: document.getElementById('correo').value,
            contraseña: document.getElementById('contraseña').value,
            imagen: "",
            siguiendo: []
        }
    }).then(res => {
        console.log(res);
        if (res.data.codigoResultado == 1) {   //si el data al ingresar email y correo da codigoResultado = 1 nos redirecciona a otra pagina
            window.location.href = "login.html";
        }else{
            document.getElementById('error').style.display = 'block';
        }    
    }).catch(error => {
        console.error(error);
    });

    validarCampoVacio('correo');
    validarCampoVacio('contraseña');
    validarCampoVacio('nombre');
    validarCampoVacio('apellido');
}
