byte server[] = { 192,168,0,128}; 
int numero1=0;
float numero2=1.8;
int numero3=2;
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

if (client.connect(server, 80)>0) {
     Serial.println("Conexion Establecida con el Servidor");  //Conexion con el servidor
           Serial.print("Almacenando en Servidor: Dato: "); 
           Serial.print(numero1);
           Serial.print("- - ");
           Serial.print(numero2);
           Serial.print("- - ");
           Serial.print(numero3);
           client.print("GET http://192.168.0.128/directorio1/conexion.php?var1=");
           client.print(numero1);
           client.print("&temp=");
           client.print(numero2);
           client.print("&var3=");
           client.print(numero3);
           client.println(" HTTP/1.0");
           client.println("User-Agent: Arduino 1.0");
           client.println();
           numero1= numero1 +1;
           numero2= numero2 +1;
           numero3= numero3 +1;
      }
   else {
    Serial.println("Error en la Conexion al Servidor");
    
  }
   client.stop();
   client.flush();
  
}
void printWifiData() {
  // print your board's IP address:
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);
  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());
  }
