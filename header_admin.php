<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yoyo Manualidades</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


    <!--Letra de Quicksand-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <!--Letr de fredoka-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wdth,wght@75..125,300..700&display=swap"
        rel="stylesheet">

    <!--Letras de poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
    body {
        margin: 0;
        background-color: #fadaddff;
        /* background-image: url("fotos/bubbles.svg");
    background-repeat: repeat;
    background-size: auto;
    background-attachment: fixed; */
    }

    /* Targeta grande\principal */
    .tarjeta {
        background-color: #fff6eeff;
        margin: 30px auto;
        padding: 60px 20px 20px;
        width: 95%;
        max-width: 1500px;
        border-radius: 24px;
        box-shadow: 0 10px 22px #0000001a;
        position: relative;
        border: 3px dashed #d4a373;
        border-radius: 15px;
        padding: 1.5rem;
    }

    /*Barra de navegacion*/
    .navbar {
        background-color: #D8BFA0;
        border-radius: 16px;
        box-shadow: 0 4px 10px #0000001a;
        padding: 12px 24px;
        position: absolute;
        top: -25px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: calc(100% - 20%);
        max-width: 800px;
    }

    /* letras de Barra de navegacion*/
    .navbar a {
        text-decoration: none;
        color: #5F4B32;
        font-weight: bold;
        padding: 0 12px;
    }

    /*Efecto al pasar el raton de las secciones*/
    .navbar a:hover {
        text-decoration: underline;
    }

    /*Titulo*/
    h1 {
        color: #6B4F3A;
        font-size: 45px;
        font-weight: bolder;
        justify-content: center;
        display: flex;
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }


    h2 {
        color: #88654a;
        font-weight: bold;
    }

    .Quicksand {
        font-family: "Quicksand", sans-serif;
        font-optical-sizing: auto;
        font-weight: 300;
        font-style: normal;
    }

    .fredoka {
        font-family: "Fredoka", sans-serif;
        font-optical-sizing: auto;
        font-style: normal;
    }

    .poppins-thin {
        font-family: "Poppins", sans-serif;
        font-weight: 100;
        font-style: normal;
    }

    .poppins-extralight {
        font-family: "Poppins", sans-serif;
        font-weight: 200;
        font-style: normal;
    }

    .poppins-light {
        font-family: "Poppins", sans-serif;
        font-weight: 300;
        font-style: normal;
    }

    .poppins-regular {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .poppins-medium {
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
    }

    .poppins-semibold {
        font-family: "Poppins", sans-serif;
        font-weight: 600;
        font-style: normal;
    }

    .poppins-bold {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        font-style: normal;
    }

    .poppins-extrabold {
        font-family: "Poppins", sans-serif;
        font-weight: 800;
        font-style: normal;
    }

    .poppins-black {
        font-family: "Poppins", sans-serif;
        font-weight: 900;
        font-style: normal;
    }

    .poppins-thin-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 100;
        font-style: italic;
    }

    .poppins-extralight-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 200;
        font-style: italic;
    }

    .poppins-light-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 300;
        font-style: italic;
    }

    .poppins-regular-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: italic;
    }

    .poppins-medium-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: italic;
    }

    .poppins-semibold-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 600;
        font-style: italic;
    }

    .poppins-bold-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        font-style: italic;
    }

    .poppins-extrabold-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 800;
        font-style: italic;
    }

    .poppins-black-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 900;
        font-style: italic;
    }


    /*Colores secundarios*/
    .c-1 {
        background-color: #dce8fd;
    }

    .c-2 {
        background-color: #f0dcfd;
    }

    form {
        max-width: 500px;
        margin: auto;
    }

    .est {
        border-color: #e2bdfbff;
        /* border-style: none; */
        padding: 0.5rem;
        border-radius: 10px;
        background-color: #edd8feff;
    }

    .ejem {
        padding: 10%;
        padding-bottom: 5%;
        border-radius: 25px;
        width: 80px;
        height: 100px;
    }

    table {
        border-collapse: separate;
        border-spacing: 0;
        border: 3px dashed #b58dcdff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 15px #0000001a;
    }

    thead th {
        background-color: #e2befaff;
        padding: 10px;
        text-align: center;
    }

    tbody tr {
        background-color: #f0dcfd;
        border: 3px dashed #b58dcdff;
        border-radius: 45px;
        overflow: hidden;
        text-align: center;
    }

    tbody tr td {
        border-top: 3px dashed #b58dcdff;
        padding: 10px;

    }

    .action {
        width: 90px;
        margin: 5px;
    }

    footer {
        background-color: #D8BFA0;
        justify-content: space-between;
        padding: 3%;
        display: flex;
        margin: 0%;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="tarjeta">

            <div class="navbar shadow mb-4 Quicksand">
                <a href="dashboard.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 
                            0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 
                            0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0
                             .5.5h4a.5.5 0 0 0 .5-.5" />
                    </svg> Inicio
                </a>

                <a href="admin_productos.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-standing-dress" viewBox="0 0 16 16">
                        <path
                            d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-.5 12.25V12h1v3.25a.75.75 0 0 0 1.5 0V12h1l-1-5v-.215a.285.285 0 0 1 .56-.078l.793 2.777a.711.711 0 1 0 1.364-.405l-1.065-3.461A3 3 0 0 0 8.784 3.5H7.216a3 3 0 0 0-2.868 2.118L3.283 9.079a.711.711 0 1 0 1.365.405l.793-2.777a.285.285 0 0 1 .56.078V7l-1 5h1v3.25a.75.75 0 0 0 1.5 0Z" />
                    </svg>
                    </svg>Productos
                </a>

                <a href="admin_pedidos.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag"
                        viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 
                        0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                    </svg>Pedidos
                </a>

                <a href="admin_clientes.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 
                            10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg> Clientes
                </a>

                <a href="admin_reseñas.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                        <path d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 
                            1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866
                             3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 
                             1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg> Reseñas
                </a>

            </div>