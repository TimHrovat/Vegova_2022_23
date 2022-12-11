#include <Adafruit_Sensor.h>
#include <DHT.h>
#include <ESPAsyncWebServer.h>
#include <SPIFFS.h>
#include <WiFi.h>

#define dhtPin 27
#define humidifier 25
#define heater 26

const char *ssid = "Tenda_1BD460";
const char *pass = "T48mgVEf";

float humidity;
float temperature;
char chr_humidity[100];
char chr_temperature[100];

unsigned long currentTime = millis();
unsigned long prevTime = currentTime - 5000;

DHT dhtSensor(dhtPin, DHT11);

String state;

AsyncWebServer server(80);

void setup() {
    Serial.begin(115200);
    pinMode(heater, OUTPUT);
    pinMode(humidifier, OUTPUT);

    dhtSensor.begin();

    if (!SPIFFS.begin(true)) {
        Serial.println("An Error has occurred while mounting SPIFFS");
        return;
    }

    WiFi.begin(ssid, pass);
    while (WiFi.status() != WL_CONNECTED) {
        delay(1000);
        Serial.println("Connecting to WiFi..");
    }
    Serial.println(WiFi.localIP());

    server.on("/", HTTP_GET, [](AsyncWebServerRequest *request) {
        request->send(SPIFFS, "/index.html", String(), false);
    });

    server.on("/styles.css", HTTP_GET, [](AsyncWebServerRequest *request) {
        request->send(SPIFFS, "/styles.css", "text/css");
    });

    server.on("/script.js", HTTP_GET, [](AsyncWebServerRequest *request) {
        request->send(SPIFFS, "/script.js", "text/javascript");
    });

    server.on("/humidifier/on", HTTP_POST, [](AsyncWebServerRequest *request) {
        digitalWrite(humidifier, HIGH);
        request->send(200);
    });

    server.on("/humidifier/off", HTTP_POST, [](AsyncWebServerRequest *request) {
        digitalWrite(humidifier, LOW);
        request->send(200);
    });

    server.on("/heater/on", HTTP_POST, [](AsyncWebServerRequest *request) {
        digitalWrite(heater, HIGH);
        request->send(200);
    });

    server.on("/heater/off", HTTP_POST, [](AsyncWebServerRequest *request) {
        digitalWrite(heater, LOW);
        request->send(200);
    });

    server.on("/humidifier/state", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (digitalRead(humidifier))
            request->send(200, "text/plain", "ON");
        else
            request->send(200, "text/plain", "OFF");
    });

    server.on("/heater/state", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (digitalRead(heater))
            request->send(200, "text/plain", "ON");
        else
            request->send(200, "text/plain", "OFF");
    });

    server.on("/temperature/state", HTTP_GET, [](AsyncWebServerRequest *request) {
        request->send(200, "text/plain", chr_temperature);
    });

    server.on("/humidity/state", HTTP_GET, [](AsyncWebServerRequest *request) {
        request->send(200, "text/plain", chr_humidity);
    });

    server.begin();
}

void loop() {

    currentTime = millis();

    if (currentTime - prevTime > 5000) {
        temperature = dhtSensor.readTemperature();
        humidity = dhtSensor.readHumidity();

        sprintf(chr_humidity, "%f", humidity);
        sprintf(chr_temperature, "%f", temperature);

        prevTime = currentTime;

        Serial.println(chr_temperature);
        Serial.println(chr_humidity);
    }
}