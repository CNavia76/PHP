def obtener_longitud(): 
    longitud = float(input("Ingresa la longitud del paralelepípedo: ")) 
    return longitud 

def obtener_ancho(): 
    ancho = float(input("Ingresa el ancho del paralelepípedo: ")) 
    return ancho 

def obtener_altura(): 
    altura = float(input("Ingresa la altura del paralelepípedo: ")) 
    return altura 

def calcular_volumen_paralelepipedo(longitud, ancho, altura): 
    volumen = longitud * ancho * altura 
    return volumen 

longitud = obtener_longitud() 
ancho = obtener_ancho() 
altura = obtener_altura() 

volumen = calcular_volumen_paralelepipedo(longitud, ancho, altura) 

print("El volumen del paralelepípedo es:", volumen)
