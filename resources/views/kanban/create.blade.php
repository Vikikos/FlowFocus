<div class="container">
    
    <h1>Nuevo Proyecto</h1>
    
    <form action="{{ route('kanban.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Proyecto:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>

</div>
