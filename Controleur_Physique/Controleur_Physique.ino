#include <Ethernet.h>
#include <MySQL_Connection.h>

byte mac_addr[] = { 0xA8, 0x61, 0x0A, 0xAE, 0xA9, 0xB1};

IPAddress server_addr(192,168,64,157);  // IP of the MySQL *server* here
char user[] = "arduino";              // MySQL user login username
char password[] = "arduino";        // MySQL user login password
char default_db[] = "Webedia";

EthernetClient client;
MySQL_Connection conn((Client *)&client);

void setup() {
  Serial.begin(9600);
  while (!Serial); // wait for serial port to connect
  Ethernet.begin(mac_addr);
  Serial.println("Connecting...");
  if (conn.connect(server_addr, 3306, user, password, default_db)) {
    Serial.println("Connecté");
    delay(1000);
    // You would add your code here to run a query once on startup.
  }
  else
    Serial.println("Connection failed.");
  conn.close();
}

void loop() {
}
