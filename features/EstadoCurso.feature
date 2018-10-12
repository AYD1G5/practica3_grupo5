Feature: Autenticación
    Como estudiante
    Quiero que el sistema proteja mi información, tanto la del estado de mi(s) 
    carrera(s) como la información personal Para que nadie más pueda verla o modificarla.

  Scenario: Ingresar a la pagina Login y no se ingresan los datos del usuario, 
            y solo se procede a presionar el boton de ingresar ("Login"),  
            por lo que no nos debe dejar ingresar al sistema y nos deja en la pagina de "Login"
  Given there is a user with email: "willyslider@gmail.com" And password: 12345678
    And I am on "http://127.0.0.1:8000/login"
  When I fill in "email" with ""
    And I fill in "password" with ""
    And I press "Login"
  Then I should see "Login"