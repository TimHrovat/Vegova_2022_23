#include <Adafruit_Sensor.h>
#include <DHT.h>
#include <ESPAsyncWebServer.h>
#include <SPIFFS.h>
#include <WiFi.h>

#define dhtPin 27
#define dehumidifier 25
#define heater 26
#define default_hyst 2
#define default_temp 22
#define default_hum 50

const char *ssid = "Tenda_1BD460";
const char *pass = "T48mgVEf";

float humidity;
float temperature;
char chr_humidity[100];
char chr_temperature[100];

float temp_hyst = default_hyst;
float hum_hyst = default_hyst;
float wanted_temp = default_temp;
float wanted_hum = default_hum;

unsigned long currentTime = millis();
unsigned long prevTime = currentTime - 5000;

DHT dhtSensor(dhtPin, DHT11);

String state;

AsyncWebServer server(80);

void autoHeater(float currentTemp);
void autoDehumidifier(float currentTemp);

void setup() {
    Serial.begin(115200);
    pinMode(heater, OUTPUT);
    pinMode(dehumidifier, OUTPUT);

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

    // dehumidifier routes
    server.on("/dehumidifier/on", HTTP_POST, [](AsyncWebServerRequest *request) {
        digitalWrite(dehumidifier, HIGH);
        request->send(200);
    });

    server.on("/dehumidifier/off", HTTP_POST, [](AsyncWebServerRequest *request) {
        digitalWrite(dehumidifier, LOW);
        request->send(200);
    });

    server.on("/dehumidifier/state", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (digitalRead(dehumidifier))
            request->send(200, "text/plain", "ON");
        else
            request->send(200, "text/plain", "OFF");
    });

    server.on("/dehumidifier/set-hyst", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (request->hasParam("value"))
            hum_hyst = atoi(request->getParam("value")->value().c_str());

        request->send(200);
    });

    server.on("/dehumidifier/set-wanted-value", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (request->hasParam("value"))
            wanted_hum = atoi(request->getParam("value")->value().c_str());

        request->send(200);
    });

    // heater routes
    server.on("/heater/on", HTTP_POST, [](AsyncWebServerRequest *request) {
        digitalWrite(heater, HIGH);
        request->send(200);
    });

    server.on("/heater/off", HTTP_POST, [](AsyncWebServerRequest *request) {
        digitalWrite(heater, LOW);
        request->send(200);
    });

    server.on("/heater/state", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (digitalRead(heater))
            request->send(200, "text/plain", "ON");
        else
            request->send(200, "text/plain", "OFF");
    });

    server.on("/heater/set-hyst", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (request->hasParam("value"))
            temp_hyst = atoi(request->getParam("value")->value().c_str());

        request->send(200);
    });

    server.on("/heater/set-wanted-value", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (request->hasParam("value"))
            wanted_temp = atoi(request->getParam("value")->value().c_str());

        request->send(200);
    });

    // current states
    server.on("/temperature/state", HTTP_GET, [](AsyncWebServerRequest *request) {
        request->send(200, "text/plain", chr_temperature);
    });

    server.on("/humidity/state", HTTP_GET, [](AsyncWebServerRequest *request) {
        request->send(200, "text/plain", chr_humidity);
    });

    server.on("/slider/states", HTTP_GET, [](AsyncWebServerRequest *request) {
        String data = "{\"temp_slider\":" + String(wanted_temp, 0) + ",\"temp_hyst\":" + String(temp_hyst, 0) + ",\"hum_slider\":" + String(wanted_hum, 0) + ",\"hum_hyst\":" + String(hum_hyst, 0) + "}";

        request->send(200, "text/plain", data);
    });

    server.serveStatic("/", SPIFFS, "/")
        .setDefaultFile("index.html");

    server.begin();
}

void loop() {

    currentTime = millis();

    if (currentTime - prevTime > 5000) {
        temperature = dhtSensor.readTemperature();
        humidity = dhtSensor.readHumidity();

        autoHeater(temperature);
        autoDehumidifier(humidity);

        sprintf(chr_humidity, "%f", humidity);
        sprintf(chr_temperature, "%f", temperature);

        prevTime = currentTime;

        Serial.println(chr_temperature);
        Serial.println(chr_humidity);
    }
}

void autoHeater(float currentTemp) {
    if (currentTemp <= wanted_temp)
        digitalWrite(heater, HIGH);

    if (currentTemp >= wanted_temp + temp_hyst) {
        digitalWrite(heater, LOW);
    }
}

void autoDehumidifier(float currentHum) {
    if (currentHum <= wanted_hum)
        digitalWrite(dehumidifier, LOW);

    if (currentHum >= wanted_hum + hum_hyst) {
        digitalWrite(dehumidifier, HIGH);
    }
}