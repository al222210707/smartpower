<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url("https://images.unsplash.com/photo-1617791160505-6f00504e3519?q=80&w=1528&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        section {
            position: relative;
            max-width: 400px;
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(55px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 3rem;
        }

        .inputbox input {
            width: 100%;
            height: 60px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1rem;
            padding: 0 35px 0 5px;
            color: #fff;
        }

        .inputbox ion-icon {
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2rem;
            top: 20px;
        }

        h4 {
            font-size: 2rem;
            color: #fff;
            text-align: center;
        }

        .inputbox {
            position: relative;
            margin: 30px 0;
            max-width: 310px;
            border-bottom: 2px solid #fff;
        }

        .inputbox label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.5s ease-in-out;
        }

        input:focus~label,
        input:valid~label {
            top: -5px;
        }

        button {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            background-color: rgba(255, 255, 255, 1);
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.4s ease;
        }

        button:hover {
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body>

    <section>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h4>Registro</h4>
            <div class="inputbox">
                <ion-icon name="person-outline"></ion-icon>
                <input type="text" placeholder="" name="nombre" required autofocus>
                <label for="">Nombre</label>
            </div>
            <div class="inputbox">
                <ion-icon name="person-outline"></ion-icon>
                <input type="text" placeholder="" name="app" required>
                <label for="">Apellido Paterno</label>
            </div>
            <div class="inputbox">
                <ion-icon name="person-outline"></ion-icon>
                <input type="text" placeholder="" name="apm" required>
                <label for="">Apellido Materno</label>
            </div>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" placeholder="" name="email" required>
                <label for="">Email</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" placeholder="" name="contraseña" required>
                <label for="">Contraseña</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" placeholder="Confirmar Contraseña..." name="contraseña_confirmation" required>
                <label for="">Confirmar Contraseña</label>
            </div>
            <div class="inputbox">
                <ion-icon name="call-outline"></ion-icon>
                <input type="text" placeholder="" name="telefono" required>
                <label for="">Teléfono</label>
            </div>
            <div class="inputbox">
                <ion-icon name="calendar-outline"></ion-icon>
                <input type="date" placeholder="" name="fn" required>
                <label for="">Fecha de Nacimiento</label>
            </div>
            <button type="submit">Registrarse</button>
        </form>
    </section>

</body>

</html>
