<style>
    :root {
        --primary-color: #2563eb;
        --bg-color: #f3f4f6;
        --text-color: #1f2937;
    }

    .login-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-card {
        background: white;
        padding: 2.5rem;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 400px;
    }

    .login-card h2 {
        margin-bottom: 1.5rem;
        color: var(--text-color);
        text-align: center;
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        color: #4b5563;
    }

    .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        outline: none;
        transition: border-color 0.2s;
    }

    .form-group input:focus {
        border-color: var(--primary-color);
        ring: 2px var(--primary-color);
    }

    .btn-login {
        width: 100%;
        padding: 0.75rem;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-login:hover {
        background-color: #1d4ed8;
    }

    .footer-links {
        margin-top: 1.5rem;
        text-align: center;
        font-size: 0.85rem;
    }

    .footer-links a {
        color: var(--primary-color);
        text-decoration: none;
    }
</style>

<div class="login-container">
    <div class="login-card">
        <h2>Iniciar Sesión</h2>
        <form action="/auth/login" method="POST">
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-login">Entrar</button>
        </form>
        <div class="footer-links">
            <p>¿No tienes cuenta? <a href="/registro">Regístrate aquí</a></p>
        </div>
    </div>
</div>