Feature: CRUD CLIENTES
    Como administrador necesito llevar un control de los clientes pertenecientes a la pagina,
    esto servira para poder dar de alta, modificar o eliminar la informacion inicial con la cual
    se haya registrado el usuario con rol de clientes dentro de la aplicacion.

Scenario: Ingresar a la pagina de CREAR CLIENTE y registrar nuevo usuario que poseean rol de cliente
          y que ademas este aun no exista dentro de la Base de Datos, con esto el cliente nuevo
          creado podra ingresar a la pagina sin problemas.

  Given  I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "admin@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/CrearCliente"
    And I fill in "nombres" with "William"
    And I fill in "apellidos" with "Lopez"
    And I fill in "nit" with "12345678"
    And I fill in "direnvio" with "Casa William"
    And I fill in "correo" with "willyslider@gmail.com"
    And I fill in "pass" with "12345678"
    When I press "CrearCliente"
    And I go to "http://127.0.0.1:8000/logout"
    And I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    Then I go to "http://127.0.0.1:8000/Admin"

Scenario: Tratar de registrar a un nuevo cliente con un correo electronico el cual pertenezca a
          otro cliente dentro de la aplicacion, como resultado nos debera de mostrar un mensaje de error.

  Given  I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "admin@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/CrearCliente"
    And I fill in "nombres" with "William"
    And I fill in "apellidos" with "Lopez"
    And I fill in "nit" with "12345678"
    And I fill in "direnvio" with "Casa William"
    And I fill in "correo" with "willyslider@gmail.com"
    And I fill in "pass" with "12345678"
    When I press "CrearCliente"
    Then I should see "El correo willyslider@gmail.com se ha registrado con otra cuenta."


Scenario: Que el cliente quien es un usuario de la aplicacion ha cambiado su direccion de correo
          con el cual se registro y desea que utilizar esta nueva direccion de correo para poder
          loguearse en la aplicacion, como resultado podremos loguear al mismo cliente con el correo nuevo
          y no permitir que entre con el correo anterior.

      Given  I am on "http://127.0.0.1:8000/login"
        And I fill in "email" with "admin@gmail.com"
        And I fill in "password" with "12345678"
        And I press "Login"
        And I am on "http://127.0.0.1:8000/EditarCliente2/2"
        And I fill in "correo" with "willy@gmail.com"
        When I press "EditarCliente"
        And I go to "http://127.0.0.1:8000/logout"
        And I am on "http://127.0.0.1:8000/login"
        And I fill in "email" with "willy@gmail.com"
        And I fill in "password" with "12345678"
        Then I go to "http://127.0.0.1:8000/Admin"


Scenario: Dar de baja a un cliente, lo que implica eliminarlo de la base de datos y por lo tanto tambien
          dentro de la aplicacion, como resultado nos debera de listar todos los usuarios existentes,
          excepto el que se acaba de eliminar.

      Given  I am on "http://127.0.0.1:8000/login"
        And I fill in "email" with "admin@gmail.com"
        And I fill in "password" with "12345678"
        And I press "Login"
        When I go to "http://127.0.0.1:8000/EliminarCliente/2"
        And I go to "http://127.0.0.1:8000/logout"
        And I am on "http://127.0.0.1:8000/login"
        And I fill in "email" with "willy@gmail.com"
        And I fill in "password" with "12345678"
        Then I go to "http://127.0.0.1:8000/login"
