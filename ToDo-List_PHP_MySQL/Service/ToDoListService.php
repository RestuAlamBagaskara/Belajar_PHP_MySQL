<?php

    namespace Service {

    use Entity\ToDoList;
    use Repository\ToDoListRepository;

        interface ToDoListService {

            function showToDoList(): void;

            function addToDoList(string $todo): void;

            function removeToDoList(int $number): void;

        }

        class ToDoListServiceImpl implements ToDoListService {
            
            private ToDoListRepository $todoListRepository;

            public function __construct(ToDoListRepository $todoListRepository)
            {
                $this->todoListRepository = $todoListRepository;
            }

            function showToDoList(): void {
                echo "ToDo List" . PHP_EOL;

                foreach ($this->todoListRepository->findAll() as $number => $value){
                    echo $value->getId() . " " . $value->getTodo() . PHP_EOL;
                }
            }

            function addToDoList(string $todo): void {
                $toDoList = new ToDoList($todo);
                $this->todoListRepository->save($toDoList);
                echo "SUKSES MENAMBAH TODOLIST" . PHP_EOL;
            }

            function removeToDoList(int $number): void {
                if($this->todoListRepository->remove($number)){
                    echo "Sukses menghapus Todo";
                }else{
                    echo "Gagal menghapus Todo";
                }
            }
        }
    }