<style>
    :root {
        --primary-color: #2563eb;
        --bg-color: #f8fafc;
        --text-color: #334155;
        --border-color: #e2e8f0;
    }

    .registro-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--bg-color);
        font-family: 'Segoe UI', system-ui, sans-serif;
        padding: 20px;
    }

    .registro-card {
        background: white;
        padding: 2.5rem;
        border-radius: 16px;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }

    .registro-card h2 {
        margin-bottom: 0.5rem;
        color: #1e293b;
        text-align: center;
        font-size: 1.8rem;
    }

    .registro-card p {
        text-align: center;
        color: #64748b;
        margin-bottom: 2rem;
        font-size: 0.95rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .full-width {
        grid-column: span 2;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--text-color);
        font-size: 0.9rem;
    }

    .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }

    .form-group input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .btn-registro {
        width: 100%;
        padding: 0.8rem;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease;
        margin-top: 1rem;
    }

    .btn-registro:hover {
        background-color: #1d4ed8;
    }

    .login-link {
        margin-top: 1.5rem;
        text-align: center;
        font-size: 0.9rem;
        color: #64748b;
    }

    .login-link a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
    }

    @media (max-width: 480px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        .full-width {
            grid-column: span 1;
        }
    }
</style>

<div class="registro-container">
    <div class="registro-card">
        <h2>Crea tu cuenta</h2>
        <p>Únete a la plataforma de CV profesionales</p>
        
        <form action="/auth/registrarse" method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ej. Alexander" required>
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Ej. Cardona" required>
                </div>

                <div class="form-group full-width">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" placeholder="alex@ejemplo.com" required>
                </div>

                <div class="form-group full-width">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="+57 300 000 0000" required>
                </div>

                <div class="form-group full-width">
                    <label for="contrasena">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" placeholder="Min. 8 caracteres" required>
                </div>
            </div>

            <button type="submit" class="btn-registro">Registrarse</button>
        </form>

        <div class="login-link">
            ¿Ya tienes una cuenta? <a href="/inicio-sesion">Inicia sesión</a>
        </div>
    </div>
</div>