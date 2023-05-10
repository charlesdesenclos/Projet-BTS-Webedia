#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>
#include <SPI.h>
#include <Ethernet.h>

byte mac_addr[] = { 0xA8, 0x61, 0x0A, 0xAE, 0xA9, 0xB1};

IPAddress server_addr(192,168,64,157);  // IP of the MySQL *server* here
char user[] = "arduino";              // MySQL user login username
char password[] = "arduino";        // MySQL user login password
char default_db[] = "Webedia";

EthernetClient client;
MySQL_Connection conn((Client *)&client);


IPAddress ip(192, 168, 65, 2);                      // Adresse IP de votre carte Ethernet
IPAddress server(192, 168, 64, 79);                  // Adresse IP du serveur à contacter


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




  Ethernet.begin(ip);  
  delay(1000);                                        // Attente de la connexion
  Serial.println("Connexion Ethernet établie");
}

void loop() 
{
  //BDD
  row_values *row = NULL;
  long head_count = 0;
  MySQL_Cursor *cur_mem = new MySQL_Cursor(&conn);
  cur_mem->execute("SELECT * FROM `scene`");

  do {
    row = cur_mem->get_next_row();
    if (row != NULL) {
      head_count = atol(row->values[0]);
    }
  } while (row != NULL);
  delete cur_mem;
  
  if (client.connect(server, 80)) {                  // Connexion au serveur sur le port 80
    Serial.println("Connecté au serveur");
    client.println("GET / HTTP/1.0 / test");                 // Envoi de la requête HTTP
    client.println();                                 // Envoi d'une ligne vide
    delay(1000);                                      // Attente pour la réception de la réponse
    while (client.available()) {                     // Lecture de la réponse
      char c = client.read();
      Serial.print(c);
    }
    client.stop();                                    // Fermeture de la connexion
  } else {
    Serial.println("Connexion échouée");
  }
  delay(5000);   
}
