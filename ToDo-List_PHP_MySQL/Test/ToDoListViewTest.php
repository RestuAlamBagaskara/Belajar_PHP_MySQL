<?php

require_once __DIR__ . "/../Entity/ToDoList.php";
require_once __DIR__ . "/../Repository/ToDoListRepository.php";
require_once __DIR__ . "/../Service/ToDoListService.php";
require_once __DIR__ . "/../View/ToDoListView.php";
require_once __DIR__ . "/../Helper/InputHelper.php";


use \Entity\ToDoList;
use \Repository\ToDoListRepositoryImpl;
use \Service\ToDoListServiceImpl;
use \View\ToDoListView;

    function testViewShowToDoList(): void {
        $todoistRepository = new ToDoListRepositoryImpl;
        $todoistService = new ToDoListServiceImpl($todoistRepository);
        $todoistView = new ToDoListView($todoistService);

        $todoistService->addToDoList("Belajar PHP");
        $todoistService->addToDoList("Belajar PHP");
        $todoistService->addToDoList("Belajar PHP");

        $todoistView->showToDoList();

    
    }

    function testViewAddToDoList(): void {
        $todoistRepository = new ToDoListRepositoryImpl;
        $todoistService = new ToDoListServiceImpl($todoistRepository);
        $todoistView = new ToDoListView($todoistService);

        $todoistService->addToDoList("Belajar PHP");
        $todoistService->addToDoList("Belajar PHP");
        $todoistService->addToDoList("Belajar PHP");

        $todoistService->showToDoList();

        $todoistView->addToDoList();

        $todoistService->showToDoList();

    }

    function testViewRemoveToDoList(): void {
        $todoistRepository = new ToDoListRepositoryImpl;
        $todoistService = new ToDoListServiceImpl($todoistRepository);
        $todoistView = new ToDoListView($todoistService);

        $todoistService->addToDoList("Belajar PHP");
        $todoistService->addToDoList("Belajar PHP");
        $todoistService->addToDoList("Belajar PHP");

        $todoistService->showToDoList();

        $todoistView->removeToDoList();

        $todoistService->showToDoList();

    }

    testViewRemoveToDoList();