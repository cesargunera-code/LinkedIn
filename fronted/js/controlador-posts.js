function guardarPost() {
    axios({
        url: '../backend/api/posts.php',
        method: 'post',
        responseType: 'json',
        data: {
            codigoPost: 23,
            contenidoPost: document.getElementById('contenido-post').value,
            imagen: document.getElementById('imagen-post').value,
            cantidadLikes: 0,
            tiempo: "hoy"
        }
    }).then(res => {
        console.log(res);
        mostrarPosts();  
        $('#nuevo-post').modal('hide');
    }).catch(error => {
        console.error(error);
    });
}

function recomendar(like) {
    let b =document.getElementById('recomendarPost');
    if(b.style.color == 'gray'){
        b.style.color = 'blue';
        console.log(b.style.color);
        like++;
    }else{
        if(b.style.color == 'blue'){
            b.style.color = 'gray';
            console.log(b.style.color);
        }
    }
    document.getElementById('clicke').innerHTML=like;
}

function mostrarPosts() {
    axios({
        url: '../backend/api/posts.php?',
        method: 'get',
        responseType: 'json'
    }).then(res => {
        console.log(res);
        document.getElementById('posts').innerHTML = '';
        let post =res.data;
        for (let i in  post) {
            let comentarios = post[i].comentarios;
            let com = '';
            for (let j in comentarios) {
                com +=        //acumulando el codigo que genera los comentarios.
                    `<div>
                        <img class="img-fluid img-thumbnail rounded-circle" src=${post[i].comentarios[j].imagenPerfilComentario}>
                        <span class="post-user">${post[i].comentarios[j].usuario}</span>
                        <span class="post-content">${post[i].comentarios[j].comentario}</span>
                    </div>`;
            }
            document.getElementById('posts').innerHTML +=
                `<div class="container-fluid">
                    <div class="card mb-2 shadow-sm">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2">
                                    <img class="img-fluid img-thumbnail rounded-circle" style="max-width: 64px;" src=${post[i].imagenPerfilUsuario}>
                                </div>
                                <div class="col-10" style= "float: left;">    
                                    <b>${post[i].nombre}</b>
                                    <p style="font-size: .75rem; margin-bottom: 0 !important; color: #000000bf; font-weight: 640;">1523 seguidores</p>
                                    <p style="font-size: .75rem; margin-bottom: 0 !important; color: #000000bf; font-weight: 640;">${post[i].tiempo}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div style="text-align: justify; padding: 8px 13px; font-family: 'Segoe UI', Tahoma, sans-serif;">
                                <span class="post-content">${post[i].contenidoPost}</span>
                            </div>
                            <div class="image-post" style="background-image: url(${post[i].imagen});"></div>
                            <div class="px-3 py-3 post">
                                <span>
                                    <img src="img/svg/recomendar.svg">
                                    &nbsp;
                                    <span style="font-size: .9rem;"><span id="clicke">${post[i].cantidadLikes}</span></span>
                                </span>
                            <hr>
                            <div style="padding: 0 10px !important;">
                                <button class="btn post-nuevo btn-sm" id="recomendarPost"
                                style="color: gray;width: 132px; text-align: center; font-weight: 640; font-size: .95rem" onclick="recomendar(${post[i].cantidadLikes})">
                                    <i class="far fa-thumbs-up"></i> Recomendar</button>
                                <button class="btn post-nuevo btn-sm" style="width: 114px; text-align: center; font-weight: 640; font-size: .95rem"><i class="far fa-comment-alt"></i>  Comentar</button>
                                <button class="btn post-nuevo btn-sm" style="width: 116px; text-align: center; font-weight: 640; font-size: .95rem"><i class="far fa-share-square"></i>  Compartir</button>
                                <button class="btn post-nuevo btn-sm" style="width: 89px; text-align: center; font-weight: 640; font-size: .95rem"><i class="far fa-paper-plane"></i>  Enviar</button>
                            </div> 
                            <hr>
                            <b><u>Comentarios:</u></b><br>
                            <div id="comentarios-${post[i].codigoPost}">
                                ${com}
                            </div>
                            <div class="px-0">
                                <div class="input-group mb-3 mt-3">
                                    <img class="img-fluid img-thumbnail rounded-circle" style="max-width: 40px;" src="img/user.webp">
                                    <input type="text" class="form-control ml-2" placeholder="Añadir un comentario" id="comentario-post-${post[i].codigoPost}" style="border-radius: 20px; border-top-right-radius: 0; border-bottom-right-radius: 0; border-color: #8C8C8C; border-right: 0;">
                                    <div class="input-group-append">
                                        <button type="button" onclick="comentar(${post[i].codigoPost});" class="btn btn-outline-primary" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-left: 0; height: 38px; border-color: #8C8C8C;"><i class="far fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
        }
    }).catch(error => {
        console.error(error);
    });
}

mostrarPosts();

function comentar(codigoPost) {
    axios({
        url: '../backend/api/comentarios.php',
        method: 'post',   //guardar y enviar informacion.
        responseType: 'json',
        data: {
            codigoComentario: 1234,
            codigoPost: codigoPost,
            comentario: document.getElementById('comentario-post-' + codigoPost).value
        }
    }).then(res => {
        console.log(res);
        document.getElementById('comentarios-'+codigoPost).innerHTML +=
            `<div>
                <img class="img-fluid img-thumbnail rounded-circle" src="img/perfil-usuario/1.png">
                <span class="post-user">${res.data.usuario}</span>
                <span class="post-content">${document.getElementById('comentario-post-' + codigoPost).value}</span>
            </div>`;
    }).catch(error => {
        console.error(error);
    });
}
