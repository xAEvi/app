<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        .contenedorPrincipal {
            margin-left: 100%;
            display: flex;
            justify-content: center;
            gap: 20%;
            width: calc(95%);
            padding: 5%;
            margin: auto;
        }
        .seccion {
            background-color: #ffcccb;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            padding: 50px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
        }
        .btn {
            border: 1px solid #e47c;
            background-color: #fff;
            color: #e47c7c;
            padding: 8px 12px;
            border-radius: 4px;
            margin-top: 20px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #e47c7c;
            color: #fff;
        }
        input {
            padding: 6px 10px;
            border-radius: 3px;
            margin-top: 1%;
            margin-left: 10px;
            margin-bottom: 1px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .error {
            color: #FF0000;
        }
        .btn-container {
            text-align: center;
        }
        span, p {
            color: brown;
        }
    </style>
</head>
<body>
    <form id="formulario" method="post" action="index.php?c=Usuarios&f=login">
        <div class="contenedorPrincipal">
            <div class="seccion">
                <div>
                    <input type="text" id="user" name="user" placeholder="Usuario" />
                </div>
                <br><br>
                <span class="error"><?php if (isset($error)) echo $error; ?></span>
                <div>
                    <input type="password" id="contrasenia" name="contra" placeholder="Contraseña" />
                </div>
                <span class="error"><?php if (isset($error)) echo $error; ?></span>
                <br /><br>
                <div class="btn-container">
                    <button class="btn" type="submit">Ingresar</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
