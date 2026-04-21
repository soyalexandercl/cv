<style>
    .perfil-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 20px;
        font-family: sans-serif;
    }
    .form-card {
        background: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .grid-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }
    .form-group { margin-bottom: 1rem; }
    .form-group.full { grid-column: span 2; }
    label { display: block; margin-bottom: 5px; font-weight: bold; }
    input { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    .btn-guardar { 
        background: #2563eb; color: white; border: none; padding: 10px 20px; 
        border-radius: 4px; cursor: pointer; font-weight: bold;
    }
</style>

<div class="perfil-container">
    <div class="form-card">
        <h2>Mi Perfil Profesional</h2>
        <form id="form-perfil" action="http://localhost/cliente/actualizar-perfil">
            <div class="grid-form">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" required>
                </div>
                <div class="form-group">
                    <label>Email de contacto</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="telefono">
                </div>
                <div class="form-group full">
                    <label>Ciudad</label>
                    <input type="text" name="ciudad">
                </div>
            </div>
            <button type="submit" class="btn-guardar">Actualizar Perfil</button>
        </form>
    </div>
</div>

<script>
document.getElementById('form-perfil').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const datos = Object.fromEntries(formData.entries());

    try {
        const respuesta = await fetch(e.target.action, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(datos)
        });
        
        const resultado = await respuesta.json();
        alert(resultado.message);
    } catch (error) {
        console.error('Error:', error);
        alert('Error al conectar con el servidor');
    }
});
</script>