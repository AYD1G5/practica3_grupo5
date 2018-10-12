Feature: Venta Cliente
    Esta funcionalidad engloba el proceso que un cliente tienen que hacer
    para poder realizar una compra en nuestro sistema e-commerce.

    Scenario: Realizar la compra de un producto especifico sin sobrepasar la cantidad
            en stock
    Given there is a user with email: "elmerreal@hotmail.com" And password: 12345678
        And I am on "http://127.0.0.1:8000/login"
    When I fill in "email" with "elmerreal@hotmail.com"
        And I fill in "password" with "12345678"
        And I press "Login"
        And I go to "http://127.0.0.1:8000/Carrito/Vaciar"
        And I go to "http://127.0.0.1:8000/Catalogo"
        And I follow "Producto A"
        And I should see "Disponibles: 15"
        And I should see "Precio: Q250"
        And I fill in "cantidad" with "8"
        And I press "Agregar"
    Then I should see "Producto A"
        And I should see "Total: 2000.00"
        And I go to "http://127.0.0.1:8000/Carrito/Vaciar"

    Scenario: Realizar la compra de un producto especifico sobrepasando la cantidad
            en stock
    Given there is a user with email: "elmerreal@hotmail.com" And password: 12345678
        And I am on "http://127.0.0.1:8000/login"
    When I fill in "email" with "elmerreal@hotmail.com"
        And I fill in "password" with "12345678"
        And I press "Login"
        And I go to "http://127.0.0.1:8000/Carrito/Vaciar"
        And I go to "http://127.0.0.1:8000/Catalogo"
        And I follow "Producto A"
        And I should see "Disponibles: 15"
        And I should see "Precio: Q250"
        And I fill in "cantidad" with "25"
        And I press "Agregar"
    Then I should see "No tenemos suficientes productos en Stock"
        And I go to "http://127.0.0.1:8000/Carrito/Vaciar"

    Scenario: Realizar la compra de una cantidad negativa de un producto especifico.
    Given there is a user with email: "elmerreal@hotmail.com" And password: 12345678
        And I am on "http://127.0.0.1:8000/login"
    When I fill in "email" with "elmerreal@hotmail.com"
        And I fill in "password" with "12345678"
        And I press "Login"
        And I go to "http://127.0.0.1:8000/Carrito/Vaciar"
        And I go to "http://127.0.0.1:8000/Catalogo"
        And I follow "Producto A"
        And I should see "Disponibles: 15"
        And I should see "Precio: Q250"
        And I fill in "cantidad" with "-5"
        And I press "Agregar"
    Then I should see "El valor debe ser superior o igual a 0"
        And I go to "http://127.0.0.1:8000/Carrito/Vaciar"

    Scenario: Comprar más de un producto previamente agregado al carrito. 
    Given there is a user with email: "elmerreal@hotmail.com" And password: 12345678
        And I am on "http://127.0.0.1:8000/login"
    When I fill in "email" with "elmerreal@hotmail.com"
        And I fill in "password" with "12345678"
        And I press "Login"
        And I go to "http://127.0.0.1:8000/Carrito/Vaciar"
        And I go to "http://127.0.0.1:8000/Catalogo"
        And I follow "Producto A"
        And I should see "Disponibles: 15"
        And I should see "Precio: Q250"
        And I fill in "cantidad" with "10"
        And I press "Agregar"
        And I go to "http://127.0.0.1:8000/Catalogo"
        And I follow "Producto A"
        And I should see "Disponibles: 15"
        And I should see "Precio: Q250"
        And I fill in "cantidad" with "5"
        And I press "Agregar"
    Then I should see "El producto ya esta agregado"
        And I go to "http://127.0.0.1:8000/Carrito/Vaciar"