<?php

    require_once __DIR__ . "/../Entity/ToDoList.php";
    require_once __DIR__ . "/../Service/ToDoListService.php";
    require_once __DIR__ . "/../Repository/ToDoListRepository.php";
    require_once __DIR__ . "/../Config/Database.php";

    use Entity\ToDoList;
    use Service\ToDoListServiceImpl;
    use Repository\ToDoListRepositoryImpl;

    function testShowTodoList(): void
    {   
        $connection = \Config\Database::getConnection();
        $todolistRepository = new \Repository\ToDoListRepositoryImpl($connection);

        $todolistService = new \Service\ToDoListServiceImpl($todolistRepository);
        $todolistService->addToDoList("Belajar PHP");
        $todolistService->addToDoList("Belajar PHP");
        $todolistService->addToDoList("Belajar PHP");

        $todolistService->showToDoList();
    
    }

    function testAddTodoList(): void
    {   
        $connection = \Config\Database::getConnection();
        $todolistRepository = new \Repository\ToDoListRepositoryImpl($connection);

        $todolistService = new \Service\ToDoListServiceImpl($todolistRepository);
        $todolistService->addToDoList("Belajar PHP");
        $todolistService->addToDoList("Belajar PHP");
        $todolistService->addToDoList("Belajar PHP");

        // $todolistService->showToDoList();
    }

    function testRemoveTodoList(): void
    {   
        $connection = \Config\Database::getConnection();
        $todolistRepository = new \Repository\ToDoListRepositoryImpl($connection);

        $todolistService = new \Service\ToDoListServiceImpl($todolistRepository);

        echo $todolistService->removeToDoList(5) . PHP_EOL;
        echo $todolistService->removeToDoList(1) . PHP_EOL;
        echo $todolistService->removeToDoList(2) . PHP_EOL;
        echo $todolistService->removeToDoList(3) . PHP_EOL;
        echo $todolistService->removeToDoList(4) . PHP_EOL;
    }

    testShowTodoList();