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
    background-color: #FADADD;
    text-align: center;
  }

  /* Targeta grande\principal */
  .tarjeta {
    background-color: #FFF8F0;
    margin: 50px auto;
    padding: 60px 20px 20px;
    width: 90%;
    max-width: 1500px;
    border-radius: 24px;
    box-shadow: 0 8px 20px #0000001a;
    position: relative;
  }

  /*Barra de navegacion*/
  .navbar {
    background-color: #d8bfa0ff;
    border-radius: 16px;
    box-shadow: 0 4px 10px #0000001a;
    padding: 12px 24px;
    position: absolute;
    top: -25px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    justify-content: center;
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

  .navbar button {
    text-decoration: none;
    color: #5F4B32;
    background-color: #d8bfa0ff;
    border: none;
    font-weight: bold;
    padding: 0 12px;
  }

  .navbar button:hover {
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
  }


  h2 {
    color: #4a6888ff;
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

  /* Modificaciones */
  .enviar {
    background-color: #6686acff;
    padding: 10px;
    border: none;
    border-radius: 10%;
  }

  .enviar:hover {
    background-color: #4a6188ff;
  }

  .b {
    background-color: #dce8fd;
    border-radius: 10px;
    border: 5px;
    border-color: #4a6188ff;
    color: #4a6188ff;
    padding: 5px 2px;
    width: 100px;
    text-decoration: none;
  }

  a {
    text-decoration: none;
    color: #ebdfd1;
  }


  form {
    max-width: 500px;
    margin: auto;
  }

  .ejem {
    padding: 10%;
    padding-bottom: 5%;
    border-radius: 45px;
    width: 280px;
    height: 350px;
  }

  .afooter {
    text-decoration: none;
    color: #29272a;
  }

  .listfooter {
    list-style: none;
  }

  footer {
    background-color: #D8BFA0;
    justify-content: space-between;
    padding: 3%;
    display: flex;
    margin: 0%;
  }

  .invalid-feedback {
    min-height: 1.26rem;
    display: block;
  }
  </style>
</head>

<body>

  <div class="container">
    <div class="tarjeta">

      <div class="navbar shadow mb-4 Quicksand">

        <button onclick="history.back()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
            fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
            <path fill-rule="evenodd"
              d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
          </svg>
          Regresar</button>

      </div>