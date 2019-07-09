<?php

/**
 * 
 */
class Preguntas 
{

    public $preguntas;  
    
    
    function __construct($dificultad)
    {
       $preguntas= ["8"=> [
            new Pregunta("Calcule el siguiente ángulo: 49° 12'", 49.20)
            ,new Pregunta("Despeje la variable x:<br>(2-4x)-(3-4x)+ 4= -(-3+6x)+ x", 0)
            ,new Pregunta("Despeje la variable k:<br> 0.09k + 0.13(k+300)= 61", 100)
            ,new Pregunta("Resuelva: (-2)<sup>4</sup>", 16) 
            ,new Pregunta("Racionalice la fracción: <sup>7</sup>/<sub>√13<sub>", "7√13/13")
            ,new Pregunta("Calcule el siguiente ángulo: 36° 16'", 36.26)
            ,new Pregunta("Despeje la variable x:<br> -[3x-(2x+5)]= -4-[3(2x-4)-3x]", "3/2")
            ,new Pregunta("Factorice: 6st+9t-10s-15", "(2s+3)(3t-5)")
            ,new Pregunta("Despeje la variable x:<br> (x+3)(x-9)= 0", "{-3, 9}")
            ,new Pregunta("Resuelva: -2<sup>4</sup>", -16) 
         ] 
    ,"10"=> [
        new Pregunta("Simplifique y racionalice si fuera el caso la siguiente expresión: √28√63", 42)
        ,new Pregunta("Resuelva con cuadrado de un binomio: (x+4y)<sup>2</sup>", "x^2 + 8xy + 16y^2")
        ,new Pregunta("Reduzca: (x+3)<sup>2</sup>-(x+3)(x-3)", "6x")
        ,new Pregunta("Resuelva la ecuación:<br> 4[6 - 1(1 + 2m)] + 10m = 2(10-3m) + 8m ", 0) 
        ,new Pregunta("Factorice: x<sup>2</sup> - 64", "(x+8)(x-8)")
        ,new Pregunta("Despeje la variable m: (m+6)(m+4)= 0", "{-6,-4}")
        ,new Pregunta("Resuelva: w<sup>2</sup> = 16", "{-4,4}")
        ,new Pregunta("Despeje la variable e: e(e+3)= 4", "{-4,1}") 
        ,new Pregunta("Despeje la variable x: 2x + 4 -x= 4x-5", 3)
        ,new Pregunta("El valor numérico de:<br> P(x)= 2x<sup>5</sup> - 4x<sup>3</sup> + 5x - 6 para x=2", 36)    
     ]
     ,"12"=> [
        new Pregunta("Resuelva: √<sup>125</sup>/<sub>180<sub>", "5/6")
        ,new Pregunta("Resuelva utilizando factor común:<br> 6(b + 4)<sup>3</sup> - 3(b+4) + 6a(b+4)<sup>2</sup>", "3(b+4)(2(b+4)^2 - 1 + 2a (b+4))")
        ,new Pregunta("En un triángulo rectángulo, el lado c= 4079m y el ángulo B= 68°. Calcule el ángulo A", 22)
        ,new Pregunta("Resuelva: si 10 galones de gasolina cuestan Q7.65, ¿Cuánto costará llenar por completo un tanque de 18 galones?", 13.77) 
        ,new Pregunta("Encuentre el valor del ángulo: 44° 30'", 44.50)
        ,new Pregunta("Valor numérico para t=10, la expresión x= 20t + 4t<sup>2</sup>, x=100", 600)
        ,new Pregunta("Determine el valor numérico del polinomio:<br> P(x)= 2x<sup>3</sup> - 3x<sup>2</sup> + 6x - 1 para x=0", -1)
        ,new Pregunta("Resuelva: Un rombo cuyas diagonales miden 5m y 3m. Calcular el área", 7.5)
        ,new Pregunta("Resuelva: Convertir 2 años a minutos", 1051200) 
        ,new Pregunta("Resuelva:<br> 2<sup>3</sup> + 10 ÷ 2 + 5 * 3 + 4 - 5 * 2 - 8 + 4 * 2<sup>2</sup> - 16 ÷ 4 ", 26)  
     ]
    ]    ;
    
       $this->preguntas = $preguntas[$dificultad];
    }
}
     


?>