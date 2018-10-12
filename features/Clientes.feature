Feature: CRUD CLIENTES
    Como administrador necesito de un CRUD para poder dar de alta,
    modificar o eliminar usuario con rol de clientes dentro de la aplicacion.

Scenario: Ingresar a la pagina de crear cliente y registrar nuevo usuario que poseea rol de cliente
          y que ademas este aun no exista dentro de la Base de Datos.

  Given I am on "http://127.0.0.1:8000/eliminarasignacion"
    And I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/1/semestre"
    And I follow "asignar1"
    And I press "Guardar"
    And I am on "http://127.0.0.1:8000/finalizarasignacion"
    And I fill in "nota" with "65"
    And I press "actualizarnota"
    When I press "finalizarasignacion"
    Then I should see "GANADO"
