const { createApp } = Vue;

const app = createApp({
    data() {
        return {
            todoList: [],
            todo: {},
        };
    },
    methods: {
        onSubmitTodo() {
            axios.post("API/createTodo.php", this.todo, {
                headers: { "Content-Type": "multipart/form-data" },
            })
                .then((resp) => {
                    this.fetchTodo();
                    console.log(resp);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        fetchTodo() {
            axios.get("API/todo.php").then((resp) => {
                this.todoList = resp.data;
                console.log(resp.data);
            });
        },
        deleteTodo(todoId) {
            axios.post("API/deleteTodo.php", {todoId}, {
                headers: { "Content-Type": "multipart/form-data" },
            }).then((resp) => {
                this.fetchTodo();
            });
        },
        editTodo(todoId) {
            axios.post("api/editTodo.php", {todoId}, {
                headers: { "Content-Type": "multipart/form-data" },
            }).then((resp) => {
                this.fetchTodo();
            });
        },
    },
    mounted() {
        this.fetchTodo();
    },
}).mount("#app");
