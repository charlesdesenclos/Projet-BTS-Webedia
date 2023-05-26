const int buttonPin = 2;

const int potentiometerPin1 = A0;
const int potentiometerPin2 = A3;

void setup() {
  Serial.begin(9600);
  pinMode(buttonPin, INPUT_PULLUP);
  
  
}

void loop() {
  int sensorValue1 = analogRead(potentiometerPin1);
  int sensorValue2 = analogRead(potentiometerPin2);

  if (digitalRead(buttonPin) == LOW) {
    Serial.println('1');
    delay(1000);  // Délai pour éviter les rebonds
  }
  
  Serial.print(sensorValue1);
  Serial.print(",");
  Serial.println(sensorValue2);
  
  delay(100);


}
