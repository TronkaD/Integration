# Documentation

## Creation des models (Tables)

### Model Classe
- Syntaxe
    ```php artisan make:model Classe -c -m```

### Model Transaction
- Syntaxe
    ```php artisan make:model Transaction -c -m``` 

### Model Objectif
- Syntaxe
    ```php artisan make:model Objectif -c -m```   
### Insert Picture
- Syntaxe
    ```php artisan storage:link```  

### Update File env
- Syntaxe
    ```FILESYSTEM_DRIVER=public``` 
### Model Collaborateur
- Syntaxe
    ```php artisan make:model Collaborateur -c -m```
    
### Model Elève
- Syntaxe
    ```php artisan make:model Eleve -c -m```  

### Model Donnateur
- Syntaxe
    ```php artisan make:model Donnateur -c -m```
### Model Message
- Syntaxe
    ```php artisan make:model Message -c -m```

    php artisan make:migration add_lieu_to_eleves_table --table=eleves

    php artisan make:migration add_image_to_classes_table --table=classes

    php artisan make:migration add_object_to_messages_table --table=messages
 
    php artisan make:migration add_image_to_users_table --table=users


