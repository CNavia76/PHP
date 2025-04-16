def calcular_x(a, b, c):
    # Calcula la expresión dentro del paréntesis
    expresion_parentesis = 4 * a + b
    
    # Calcula las potencias
    b_cuadrado = b ** 2
    a_cuadrado = a ** 2
    
    # Calcula la multiplicación
    multiplicacion = a * c * expresion_parentesis
    
    # Corrige la fórmula para calcular x
    x = -b + b_cuadrado - multiplicacion + a_cuadrado  # Ajuste en los signos
    
    return x

# Ejemplo de uso
a = 1
b = 2
c = 3

x = calcular_x(a, b, c)
print(f"El valor de x es: {x}")
