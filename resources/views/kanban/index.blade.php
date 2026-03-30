<div class="container">
    <h1>{{ $kanban->name }}</h1>

    <a href="{{ route('tasks.create') }}" class="btn">Agregar Tarea</a>

    <div>
        
        <div class="column">
            <h3>Pendiente</h3>
            <br>    
            <ul>
                @foreach($kanban->tasks as $task)
                    @if($task->status == 'Pendiente')
                        <li>{{ $task->name }}</li>
                    @endif
                @endforeach
            </ul>
            
        </div>

        <div class="column">
            <h3>En progreso</h3>
            <br>    
            <ul>
                @foreach($kanban->tasks as $task)
                    @if($task->status == 'En progreso')
                        <li>{{ $task->name }}</li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="column">
            <h3>Completado</h3>
            <br>    
            <ul>
                @foreach($kanban->tasks as $task)
                    @if($task->status == 'Completado')
                        <li>{{ $task->name }}</li>
                    @endif
                @endforeach
            </ul>
        </div>

    </div>
</div>