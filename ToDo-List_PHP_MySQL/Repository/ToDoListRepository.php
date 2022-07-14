<?php

    namespace Repository {

        use Entity\ToDoList;
        use PDO;

        interface ToDoListRepository {

            function save(ToDoList $toDoList): void;

            function remove(int $number): bool;

            function findAll(): array;

        }

        class ToDoListRepositoryImpl implements ToDoListRepository {

            public array $toDoList = [];

            private PDO $connection;

            public function __construct(PDO $connection)
            {
                $this->connection = $connection;
            }

            function save(ToDoList $toDoList): void {
                $sql = "INSERT INTO todolist(todo) VALUES (?)";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$toDoList->getTodo()]);
            }

            function remove(int $number): bool {

                $sql = "SELECT * FROM todolist WHERE id=?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);

                if($statement->fetch()) {
                    $sql = "DELETE FROM todolist WHERE id=?";
                    $statement = $this->connection->prepare($sql);
                    $statement->execute([$number]);

                    return true;
                }
                else {
                    return false;
                }     
            }

            function findAll(): array {
                $sql = "SELECT id, todo FROM todolist";
                $statement = $this->connection->prepare($sql);
                $statement->execute();

                $result = [];

                foreach($statement as $row) {
                    $todolist = new ToDoList();
                    $todolist->setId($row['id']);
                    $todolist->setTodo($row['todo']);

                    $result[] = $todolist;
                }

                return $result;
            }
        }
    }