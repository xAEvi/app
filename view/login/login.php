<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .contenedorPrincipal {
            background-color: #ffcccb;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-top: 10px;
        }

        .btn {
            border: 1px solid #e47c7c;
            background-color: #fff;
            color: #e47c7c;
            padding: 10px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .btn:hover {
            background-color: #e47c7c;
            color: #fff;
        }

        .error {
            color: #FF0000;
            font-size: 14px;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: brown;
        }
    </style>
</head>
<body>
    <div class="contenedorPrincipal">
        <h1>Login</h1>
        <form id="formulario" method="post" action="index.php?c=Usuarios&f=login">
            <div class="form-group">
                <input type="text" id="user" name="user" placeholder="Usuario" required />
                <span class="error"><?php if (isset($error)) echo $error; ?></span>
            </div>
            <div class="form-group">
                <input type="password" id="contrasenia" name="contra" placeholder="Contraseña" required />
                <span class="error"><?php if (isset($error)) echo $error; ?></span>
            </div>
            <div class="form-group">
                <button class="btn" type="submit">Ingresar</button>
            </div>
        </form>
    </div>
</body>
</html>
