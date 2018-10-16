Feature: Autenticación
    Como estudiante
    Quiero que el sistema proteja mi información, tanto la del estado de mi(s) 
    carrera(s) como la información personal Para que nadie más pueda verla o modificarla.

  Scenario: Ingresar a la pagina Login y no se ingresan los datos del usuario, 
            y solo se procede a presionar el boton de ingresar ("Login"),  
            por lo que no nos debe dejar ingresar al sistema y nos deja en la pagina de "Login"
  Given I am on "http://127.0.0.1:8000/login"
  When I fill in "email" with ""
    And I fill in "password" with ""
    And I press "Login"
  Then I should see "Login"

  Scenario: Ingresar a la pagina Login e ingresar password correcta con usuario correcto, 
          mientras estoy en la pagina administrador ingresar a la opción de editar producto 
          y visualizar la lista de productos en el sistema.  
Given I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "admin@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/Admin"
  When I follow "editar_p"
  Then I should be on "http://127.0.0.1:8000/Editar"

    Scenario: Ingresar a la pagina Login e ingresar password correcta con usuario correcto, 
          mientras estoy en la pagina administrador ingresar a la opcion de crear producto 
          y visualizar un formulario para llenar los datos del producto y al final crearlo.  
Given I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "admin@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/Admin"
  When I follow "crear_p"
  And I am on "http://127.0.0.1:8000/CrearProducto"
  And I fill in "nombre" with "prueba"
  And I fill in "desc" with "prueba"
  And I fill in "cant" with "12"
  And I fill in "file" with "test.png"
  And I fill in "prec" with "12"
  And I press "crear"
  Then I should be on "http://127.0.0.1:8000/CrearProducto"


Scenario: Ingresar a la pagina Login e ingresar password correcta con usuario correcto, 
          mientras estoy en la pagina de administrador e ingresar a la opción de eliminar
          producto, luego en la vista de eliminar, presionar el boton del producto que deseo eliminar.  
Given I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "admin@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/Admin"
  When I follow "eliminar_p"
  And I am on "http://127.0.0.1:8000/Eliminar/10"
  And I am on "http://127.0.0.1:8000/Eliminar"
  Then I should be on "http://127.0.0.1:8000/Eliminar"

      Scenario: Ingresar a la pagina Login e ingresar password correcta con usuario correcto, 
          mientras estoy en la pagina de administrador, e ingresar a la opción de editar producto
          se visualizan todos los productos y se selecciona el producto que se desea editar
          se llena otra vez el formulario y se edita.
Given I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "admin@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/Admin"
  When I follow "editar_p"
  And I am on "http://127.0.0.1:8000/Editar2/5"
  And I fill in "nombre" with "prueba"
  And I fill in "desc" with "prueba"
  And I fill in "desc" with "prueba"
  And I fill in "cant" with "12"
  And I fill in "file" with "test.png"
  And I fill in "prec" with "12"
  And I press "editar" 
  Then I should be on "http://127.0.0.1:8000/Editar2/5"