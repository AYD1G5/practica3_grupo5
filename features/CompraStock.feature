Feature: Comprar producto: Ciclo Completo
        Compra de un producto con stock disponible desde
        el ingreso del producto que se desea comprar ingresando 
        la cantidad y precio deseado y proceder a realizar la compra. 

  Scenario: ST-1: Comprar producto: Ciclo Completo
        Con el usuario admin@gmail.com con password 
        12345678 en el sistema y con el producto A con un stock 
        de 15 unidades a un precio de Q500.00, realizando la 
        prueba de la compra de un producto con stock disponible y observar
        la nueva cantidad disponible.
  Given there is a user with email: "admin@gmail.com" And password: 12345678
    And I am on "http://127.0.0.1:8000/login"
  When I fill in "email" with "admin@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/ProveedorProducto"
    And I Select a Product "A"
    And I fill in "cantidad" with "50"
    And I fill in "precio" with "500"
    And I press "Agregar"
    And I follow "Realizar compra"
  Then I am on "http://127.0.0.1:8000/PerfilProducto/2"
    And I should see "65"


  Scenario: ST-2: Comprar producto: Eliminar de la Lista de productos Seleccionado
        Con el usuario admin@gmail.com con password 
        12345678 en el sistema y con el producto A con un stock 
        de 65 unidades a un precio de Q500.00, se agrega un producto A con una cantidad
        de 50 unidades y un precio de Q.500.00 a la lista 
        de productos a comprar y luego se procede a eliminar de la lista esto no deberá afectar
        el stock del producto A.
  Given there is a user with email: "willyslider@gmail.com" And password: 12345678
    And I am on "http://127.0.0.1:8000/login"
  When I fill in "email" with "admin@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/ProveedorProducto"
    And I Select a Product "A"
    And I fill in "cantidad" with "50"
    And I fill in "precio" with "500"
    And I press "Agregar"
    And I follow "Eliminar"
    And I follow "Realizar compra"
  Then I am on "http://127.0.0.1:8000/PerfilProducto/2"
    And I should see "65"


  Scenario: ST-3: Comprar producto: Ingresar una cantidad negativa en la compra de un producto
        Con el usuario admin@gmail.com con password 
        12345678 en el sistema y con el producto A con un stock 
        de 65 unidades a un precio de Q500.00, se agrega un producto A con una cantidad
        de -5 unidades y un precio de Q.500.00 a la lista 
        de productos a comprar y podra comprobar que el inventario ha disminuido por
        lo que ahora el stock sera de 60.
  Given there is a user with email: "willyslider@gmail.com" And password: 12345678
    And I am on "http://127.0.0.1:8000/login"
  When I fill in "email" with "admin@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/ProveedorProducto"
    And I Select a Product "A"
    And I fill in "cantidad" with "-5"
    And I fill in "precio" with "500"
    And I press "Agregar"
    And I follow "Realizar compra"
  Then I am on "http://127.0.0.1:8000/PerfilProducto/2"
    And I should see "60"







  