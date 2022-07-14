<?php

    namespace View {

    use Service\ToDoListService;
    use Helper\InputHelper;

        class ToDoListView {

            private ToDoListService $ToDoListService;

            public function __construct(ToDoListService $ToDoListService) 
            {
                $this->ToDoListService = $ToDoListService;
            }

            function showToDoList(): void {
                while(true){
                    $this->ToDoListService->showToDoList();
                    
                    echo "Menu" . PHP_EOL;
                    echo "1. Tambah To Do" . PHP_EOL;
                    echo "2. Hapus To Do" . PHP_EOL;
                    echo "x. Keluar" . PHP_EOL;
        
                    $pilihan = InputHelper::input("Pilih ");
        
                    if($pilihan == 1){
                        $this->addToDoList();
                    }
                    elseif($pilihan == 2){
                        $this->removeToDoList();
                    }
                    elseif($pilihan == "x"){
                        break;
                    }
                    else{
                        echo "Pilihan Tidak Dimengerti" . PHP_EOL;
                    }
                }  
        
                echo "Sampai Berjumpa Lagi" . PHP_EOL;
            }

            function addToDoList (): void {
                echo "Menambah Todo" . PHP_EOL;

                $todo = InputHelper::input("Todo (x untuk batal)");

                if($todo == "x"){
                    echo "Batal Menambah To Do";
                }else{
                    $this->ToDoListService->addToDoList($todo);
                }
            }

            function removeToDoList (): void {
                $pilihan = InputHelper::input("Nomor (x untuk batal)");

                if($pilihan == "x"){
                    echo "Batal menghapus To Do";
                }
                else{
                    $this->ToDoListService->removeToDoList($pilihan);
                }
            }
        }
    }