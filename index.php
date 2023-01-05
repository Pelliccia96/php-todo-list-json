<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-todo-list-json</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-dark">
    <div id="app">
        <div class="container my-5 py-5 rounded bg-secondary">
            <div class="row flex-column align-items-center">
                <div class="col-4">
                    <div class="pb-5">
                        <h1 class="text-center text-white">PHP ToDo List JSON</h1>
                    </div>
                    <div class="bg-white">
                        <div class="border-bottom d-flex justify-content-between p-3" v-for="(todo, i) in todoList" :key="i">
                            <div v-if="todo.status===true" class="text-decoration-line-through">{{todo.name}}</div>
                            <div v-else>{{todo.name}}</div>
                            <div>
                                <button class="btn btn-info me-2" @click="editTodo(todo.id)" :class="{divSelected: todo.status}">V</button>
                                <button class="btn btn-danger" @click="deleteTodo(todo.id)">X</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <form @submit.prevent="onSubmitTodo" class="text-center mt-3">
                        <div class="d-flex">
                            <input class="w-100" type="text" name="name" placeholder="Inserisci Task" v-model="todo.name">
                            <button class="btn btn-primary ms-3">Inserisci</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>
