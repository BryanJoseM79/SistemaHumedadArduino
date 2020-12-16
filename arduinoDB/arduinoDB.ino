byte server[] = { 192,168,0,128}; 
#include <DHT.h>
 
// Definimos el pin digital donde se conecta el sensor
#define DHTPIN 2
// Dependiendo del tipo de sensor
#define DHTTYPE DHT11

int humedad = 0;
 
// Inicializamos el sensor DHT11
DHT dht(DHTPIN, DHTTYPE);
#include <SPI.h>
#include <WiFiNINA.h>
#include "arduino_secrets.h" 
///////please enter your sensitive data in the Secret tab/arduino_secrets.h
char ssid[] = SECRET_SSID;        // your network SSID (name)
char pass[] = SECRET_PASS;    // your network password (use for WPA, or use as key for WEP)
int keyIndex = 0;                                // your network key Index number
int status = WL_IDLE_STATUS;                     // the Wifi radio's status

WiFiClient client;
void setup() {
  //Initialize serial and wait for port to open:
  Serial.begin(9600);

  // Comenzamos el sensor DHT
  dht.begin();
  
  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }
  // check for the WiFi module:
  if (WiFi.status() == WL_NO_MODULE) {
    Serial.println("Falló la comunicación con el módulo Wifi");
    // don't continue
    while (true);
  }
  // attempt to connect to Wifi network:
  while (status != WL_CONNECTED) {
    Serial.print("Conectando a la red, SSID: ");
    Serial.println(ssid);
    status = WiFi.begin(ssid, keyIndex, pass);
    // wait 10 seconds for connection:
    delay(10000);
  }
  // once you are connected :
  Serial.print("Conectado a la red ");
  printWifiData();
}
void loop() {
  // check the network connection once every 10 seconds:
  delay(5000);

  // Leemos la temperatura en grados centígrados (por defecto)
  float temperatura_c = dht.readTemperature();
  humedad = analogRead(A0);  //put Sensor insert into soil

if (client.connect(server, 80)>0) {
     Serial.println("Conexion Establecida con el Servidor");                                                  // Si la condición de establecer Conexión con el servidor se cumple, muestra el mensaje.
     client.print("GET http://192.168.0.128/Grupo_4_vespertino/SistemaHumedadArduino/conexion.php?temp_c=");      // Enviamos los datos por GET para la primera variable1 en la base de dato
     client.print(temperatura_c);
     Serial.println(temperatura_c); // enviamos la variable de arduino
     //client.print("&temp_f=");                                                                                                    //  variable2 para la base de dato
     //client.print(temperatura_f);                                                                                              //enviamos la segunda variable de arduino 
     client.print("&humedad=");                                                                                              // variable3 para la base de dato
     client.print(humedad);                                                                                                     // enviamos la tercera variable de arduino
     client.println(" HTTP/1.0");
     client.println("User-Agent: Arduino 1.0");
     client.println();
  
}
}
void printWifiData() {
  // print your board's IP address:
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);
  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());
  }
