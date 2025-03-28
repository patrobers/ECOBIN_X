#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <NewPing.h>
#include <DHT.h>

// WiFi credentials
const char* ssid = "sherry_elite";
const char* password = "Gleshmoni";

// Ultrasonic sensor pins
#define TRIG_PIN1 D5
#define ECHO_PIN1 D6
#define TRIG_PIN2 D1
#define ECHO_PIN2 D0
#define TRIG_PIN3 D3
#define ECHO_PIN3 D2
#define MAX_DISTANCE 200

// LED pins
#define BLUE_LED D8    // GPIO 15
#define RED_LED D4     // GPIO 2 (Note: D4 has built-in LED on some boards)

NewPing sonar1(TRIG_PIN1, ECHO_PIN1, MAX_DISTANCE);
NewPing sonar2(TRIG_PIN2, ECHO_PIN2, MAX_DISTANCE);
NewPing sonar3(TRIG_PIN3, ECHO_PIN3, MAX_DISTANCE);

// DHT sensor
#define DHT_PIN D7
#define DHT_TYPE DHT11
DHT dht(DHT_PIN, DHT_TYPE);

// Timing
unsigned long previousMillis = 0;
const long interval = 2000;

// Threshold (in cm)
const int THRESHOLD_DISTANCE = 10;

void setup() {
  Serial.begin(115200);
  delay(100);

  // Initialize LEDs
  pinMode(BLUE_LED, OUTPUT);
  pinMode(RED_LED, OUTPUT);
  digitalWrite(BLUE_LED, LOW);
  digitalWrite(RED_LED, LOW);

  // Initialize DHT
  dht.begin();
  Serial.println("DHT sensor initialized");

  // Connect to WiFi
  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println();
  Serial.println("WiFi connected");
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  unsigned long currentMillis = millis();

  if (currentMillis - previousMillis >= interval) {
    previousMillis = currentMillis;

    // Read ultrasonic sensors
    unsigned int distance1 = sonar1.ping_cm();
    unsigned int distance2 = sonar2.ping_cm();
    unsigned int distance3 = sonar3.ping_cm();

    // Handle invalid readings
    distance1 = (distance1 == 0) ? MAX_DISTANCE : distance1;
    distance2 = (distance2 == 0) ? MAX_DISTANCE : distance2;
    distance3 = (distance3 == 0) ? MAX_DISTANCE : distance3;

    // Print distances
    Serial.print("Sensor 1: "); Serial.print(distance1); Serial.println(" cm");
    Serial.print("Sensor 2: "); Serial.print(distance2); Serial.println(" cm");
    Serial.print("Sensor 3: "); Serial.print(distance3); Serial.println(" cm");

    // Read DHT sensor
    float humidity = dht.readHumidity();
    float temperature = dht.readTemperature();

    if (isnan(humidity) || isnan(temperature)) {
      Serial.println("DHT: Failed to read");
    } else {
      Serial.print("Humidity: "); Serial.print(humidity); Serial.print(" %\t");
      Serial.print("Temperature: "); Serial.print(temperature); Serial.println(" °C");
    }

    // Check bin status
    bool binFull = (distance1 < THRESHOLD_DISTANCE && 
                   distance2 < THRESHOLD_DISTANCE && 
                   distance3 < THRESHOLD_DISTANCE);

    if (binFull) {
      Serial.println("BIN STATUS: FULL");
      digitalWrite(BLUE_LED, LOW);  // Turn off blue LED
      
      // Blink red LED 10 times
      for (int i = 0; i < 10; i++) {
        digitalWrite(RED_LED, HIGH);
        delay(200);
        digitalWrite(RED_LED, LOW);
        delay(200);
      }
    } else {
      Serial.println("BIN STATUS: OKAY");
      digitalWrite(RED_LED, LOW);   // Turn off red LED
      
      // Blink blue LED once
      digitalWrite(BLUE_LED, HIGH);
      delay(200);
      digitalWrite(BLUE_LED, LOW);
    }

    // WiFi status
    Serial.println(WiFi.status() == WL_CONNECTED ? "WiFi: Connected" : "WiFi: Disconnected");
    Serial.println("-------------------");

    // Data string
    String data = String(WiFi.status() == WL_CONNECTED ? 1 : 0) + "," + 
                  String(distance1) + "," + String(distance2) + "," + 
                  String(distance3) + "," + String(humidity) + "," + 
                  String(temperature) + "," + String(binFull ? 1 : 0);
    Serial.println("Data: " + data);
  }
}